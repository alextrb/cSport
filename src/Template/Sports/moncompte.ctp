<?php
$this->assign('title', 'Mon Compte');?>

<div class="page-header">
<h2>Mon compte</h2>
</div>
<div id="div_picture">
<?php
    	if($user_image_extension != "none")
    	{
    		echo $this->Html->image('photo_profil/'.$user_id.'.'.$user_image_extension, array('class' => 'profil_picture'));
    	} 
    	else
    	{
    		echo $this->Html->image('photo_profil/photo_defaut.png', array('class' => 'profil_picture'));
    	}
 ?>
</div>

 <div id="moncInfo">

    <ul style="list-style-type: none;">
        <li id="moncEmail"><strong><?= $user_email ?></strong></li>
        <li id="moncID"><?= $user_id ?></li> 
    </ul>
    <button id="moncChangePasswordButton" type="button" class="btn btn-info" data-toggle="modal" data-target="#changePasswordModal">
      Modifier mon mot de passe
    </button>

</div>  

<div id="moncChangePictureButton">
    <a href="" data-toggle="modal" data-target="#pictureModal">Modifier ma photo</a>
    <br>
    <?= $this->Html->Link("Supprimer ma photo", ["controller"=>"Sports", "action"=>"deleteProfilePicture"], ['confirm'=>__('Voulez vous vraiment supprimer votre photo ?')])?> 
</div>

<!-- Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier mon mot de passe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div>
            <?= $this->Form->create($new, array('url'=>array('controller' => 'sports', 'action' => 'changepassword'))); ?>
                <?= $this->Form->input('new_pw', array('label' => 'Nouveau mot de passe : ', 'type' => 'password')); ?>
                <?= $this->Form->input('confirm_new_pw', array('label' => 'Confirmer votre nouveau mot de passe : ', 'type' => 'password')); ?>
                <?= $this->Form->submit('Modifier votre mot de passe', ['class' => 'btn btn-primary']); ?>
                <?= $this->Form->end(); ?>
            
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
      </div>
    
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="pictureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier ma photo de profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div>
            <?= $this->Form->create('User', array('type' => 'file', "style" => "clear: both;")); ?>
            <?= $this->Form->input('avatar_file', array('label' => 'Télécharger une image (.jpg, .jpeg, .png)', 'type' => 'file')); ?>
            <br>
            <?= $this->Form->submit('Modifier votre photo de profil', ['class' => 'btn btn-info']); ?>
            <?= $this->Form->end(); ?>
            
            
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
      </div>
    
    </div>
  </div>
</div>

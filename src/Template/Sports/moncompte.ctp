<?php
$this->assign('title', 'Mon Compte');?>

<h3>Mes infos : </h3>
<ul>
    <li>User id : <?= $user_id ?></li>
    <li>User email : <?= $user_email ?></li>
    <li>User profile picture : 
    	<?php
    	if($user_image_extension != "none")
    	{
    		echo $this->Html->image('photo_profil/'.$user_id.'.'.$user_image_extension, array('width'=>'180px'));
    	} 
    	else
    	{
    		echo $this->Html->image('photo_profil/photo_defaut.png', array('width'=>'180px'));
    	}
    	?>
    </li>
</ul>
<?= $this->Form->create('User', array('type' => 'file')); ?>
<?= $this->Form->input('avatar_file', array('label' => 'Télécharger une image', 'type' => 'file')); ?>
<?= $this->Form->submit('Modifier votre avatar'); ?>
<?= $this->Form->end(); ?>
<?= $this->Form->postButton("Supprimer la photo", ["controller"=>"Sports", "action"=>"deleteProfilePicture"]);

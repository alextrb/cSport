<?php
$this->assign('title', 'Mon Compte');?>

<h3>Mes infos : </h3>
<?php
    	if($user_image_extension != "none")
    	{
    		echo $this->Html->image('photo_profil/'.$user_id.'.'.$user_image_extension, array('width'=>'120px', "style" => "float: left;"));
    	} 
    	else
    	{
    		echo $this->Html->image('photo_profil/photo_defaut.png', array('width'=>'120px', "style" => "float:left;"));
    	}
 ?>
<ul style="list-style-type: none;">
    <li>User id : <?= $user_id ?></li>
    <li>User email : <?= $user_email ?></li>
</ul>
<?= $this->Form->create('User', array('type' => 'file', "style" => "clear: both;")); ?>
<?= $this->Form->input('avatar_file', array('label' => 'Télécharger une image (.jpg, .jpeg, .png)', 'type' => 'file')); ?>
<?= $this->Form->submit('Modifier votre photo de profil', ['class' => 'btn btn-warning']); ?>
<?= $this->Form->end(); ?>
<?= $this->Html->Link("Supprimer votre photo", ["controller"=>"Sports", "action"=>"deleteProfilePicture"], ["class" => "btn btn-danger"])?>

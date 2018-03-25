<?php
$this->assign('title', 'Contact');?>
    
 <div class="page-header">
<h2>Contact</h2>
</div>
 
<div class="well">
    <p>Une remarque ? Une question ? N'hésitez pas à nous envoyer un commentaire, nous vous répondrons rapidement.</p> <br>

 <div class="col-sm-12 row">
          <?= $this->Form->create(); ?>
            <div class="row">
                <div class="col-sm-6 ">
                     <?php echo $this->Form->input('nom', array("label" => "Votre Nom: ", "class" => "form-control") ); ?>
                </div>
                <div class="col-sm-6">
                    <?php echo $this->Form->input('email', array("label" => "Votre Email : ", "class" => "form-control")); ?>
                </div>
             </div>
                <br>
             <?php echo $this->Form->input('content', array( "type"=>"textarea", "label" => "Votre message : ", "class" => "form-control")); ?>
            <?= $this->Form->submit('Envoyer', ['class' => 'btn btn-info']); ?>
           </form><?= $this->Form->end(); ?>
 </div>

     <figure>
            <div class="header-image text-center"><?= $this->Html->image('contact.png') ?></div> 
      </figure>
</div>
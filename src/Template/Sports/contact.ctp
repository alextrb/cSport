<?php
$this->assign('title', 'Contact');?>

<div class="container">
    
    <div class="h2">Contactez-nous</div>
    
        <div class="col-sm-12 justify-content-md-center row">
          <?= $this->Form->create() ?>
            <div class="row">
                <div class="col-sm-6">
                     <?php echo $this->Form->input('nom', array('label' => "Votre nom")); ?>
                </div>
                <div class="col-sm-6">
                    <?php echo $this->Form->input('email', array('label' => "Votre email")); ?>
                </div>
            </div>
               
            <div class="">
                 <?php echo $this->Form->input('contentl', array('label' => "Votre message", "type"=>"textarea")); ?>
            </div>
            <?= $this->Form->submit('Envoyer'); ?>
           </form><?= $this->Form->end() ?>
        </div>
    
     <figure>
            <div class="header-image justify-content-md-center"><?= $this->Html->image('contact.png') ?></div> 
      </figure>
    </div>
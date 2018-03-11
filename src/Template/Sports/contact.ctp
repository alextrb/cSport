<?php
$this->assign('title', 'Contact');?>

<div class="container">
    
    <div class="h2">Contactez-nous</div>
    
        <div class="col-sm-12 justify-content-md-center row">
           <form>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="name" class="h4">Nom</label>
                    <input type="text" class="form-control" id="name" placeholder="Entrer votre nom" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="email" class="h4">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Entrer votre email" required>
                </div>
            </div>
               
            <div class="form-group">
                <label for="message" class="h4 ">Message</label>
                <textarea id="message" class="form-control" rows="5" placeholder="Entrer votre message" required></textarea>
            </div>
               
            <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-left">Envoyer</button>
           </form>
        </div>
    
     <figure>
            <div class="header-image justify-content-md-center"><?= $this->Html->image('contact.png') ?></div> 
      </figure>
    </div>
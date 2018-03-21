<nav class="mynavbar navbar navbar-default navbar-fixed-top">

    <div >
      <div class="mynavbarheader navbar-header">
        <!-- <a class="navbar-brand" href=""><?= $this->fetch('title') ?></a> -->
        <?= $this->Html->link("WorkItOut", ["controller"=>"Sports", "action"=>"index"], ["class" => "navbar-brand"])?>
      </div>
      <ul class="mynavbarnav nav navbar-nav">

            <li class="<?php if($page=="index"){echo "active";}?>"><?= $this->Html->link("Accueil", ["controller"=>"Sports", "action"=>"index"])?></li>
            <li class="<?php if($page=="classements"){echo "active";}?>"><?= $this->Html->link("Classement", ["controller"=>"Sports", "action"=>"classements"])?></li>
            
            <li class="<?php if($page=="contact"){echo "active";}?>"><?= $this->Html->link("Contact", ["controller"=>"Sports", "action"=>"contact"])?></li>
            <li class="<?php if($page=="equipe"){echo "active";}?>"><?= $this->Html->link("Équipe", ["controller"=>"Sports", "action"=>"equipe"])?></li>
            <li class="<?php if($page=="tuto"){echo "active";}?>"><?= $this->Html->link("Tutoriels", ["controller"=>"Sports", "action"=>"tuto"])?></li>
            <li class="<?php if($page=="mention"){echo "active";}?>"><?= $this->Html->link("Mention", ["controller"=>"Sports", "action"=>"mention"])?></li>
      </ul>
        <ul class="mynavbarnavright nav navbar-nav navbar-right">
            <li class="<?php if($page=="login"){echo "active";}?>"><?= $this->Html->link("Connexion", ["controller"=>"Sports", "action"=>"login"])?></li>
        </ul>
    </div>
</nav>

<nav class="mynavbar navbar navbar-default">

    <div >
      <div class="mynavbarheader navbar-header">
        <!-- <a class="navbar-brand" href=""><?= $this->fetch('title') ?></a> -->
        <?= $this->Html->link("WorkItOut", ["controller"=>"Sports", "action"=>"index"], ["class" => "navbar-brand"])?>
      </div>
      <ul class="mynavbarnav nav navbar-nav">

            <li class="<?php if($page=="index"){echo "active";}?>"><?= $this->Html->link("Accueil", ["controller"=>"Sports", "action"=>"index"])?></li>
            <li class="<?php if($page=="classements"){echo "active";}?>"><?= $this->Html->link("Classement", ["controller"=>"Sports", "action"=>"classements"])?></li>
            
            <li class="<?php if($page=="contact"){echo "active";}?>"><?= $this->Html->link("Contact", ["controller"=>"Sports", "action"=>"contact"])?></li>
            <li class="<?php if($page=="equipe"){echo "active";}?>"><?= $this->Html->link("Équipe", ["controller"=>"Sports", "action"=>"equipe"])?></li>
            <li class="<?php if($page=="tuto"){echo "active";}?>"><?= $this->Html->link("Tutoriels", ["controller"=>"Sports", "action"=>"tuto"])?></li>
            <li class="<?php if($page=="mention"){echo "active";}?>"><?= $this->Html->link("Mention", ["controller"=>"Sports", "action"=>"mention"])?></li>
      </ul>
        <ul class="mynavbarnavright nav navbar-nav navbar-right">
            <li class="<?php if($page=="login"){echo "active";}?>"><?= $this->Html->link("Connexion", ["controller"=>"Sports", "action"=>"login"])?></li>
        </ul>
    </div>
</nav>
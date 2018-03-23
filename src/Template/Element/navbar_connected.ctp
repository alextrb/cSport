<nav class="mynavbar navbar navbar-default navbar-fixed-top">

    <div >
      <div class="mynavbarheader navbar-header">
        <!-- <a class="navbar-brand" href=""><?= $this->fetch('title') ?></a> -->
        <?= $this->Html->link("WorkItOut", ["controller"=>"Sports", "action"=>"index"], ["class" => "navbar-brand"])?>
      </div>
      <ul class="mynavbarnav nav navbar-nav">
            <li class="<?php if($page=="index"){echo "active";}?>"><?= $this->Html->link("Accueil", ["controller"=>"Sports", "action"=>"index"])?></li>
            <li class="<?php if($page=="moncompte"){echo "active";}?>"><?= $this->Html->link("Mon compte", ["controller"=>"Sports", "action"=>"moncompte"])?></li>
            <li class="<?php if($page=="seance"){echo "active";}?>"><?= $this->Html->link("Mes séances", ["controller"=>"Sports", "action"=>"seance"])?></li>
            <li class="<?php if($page=="objetsco"){echo "active";}?>"><?= $this->Html->link("Mes objets connectés", ["controller"=>"Sports", "action"=>"objetsco"])?></li>
            <li class="<?php if($page=="classements"){echo "active";}?>"><?= $this->Html->link("Classement", ["controller"=>"Sports", "action"=>"classements"])?></li>
            <li class="<?php if($page=="competition" || $page=="singlecompetition"){echo "active";}?>"><?= $this->Html->link("Compétitions", ["controller"=>"Sports", "action"=>"competition"])?></li>
            
            <li class="<?php if($page=="contact"){echo "active";}?>"><?= $this->Html->link("Contact", ["controller"=>"Sports", "action"=>"contact"])?></li>
            <li class="<?php if($page=="equipe"){echo "active";}?>"><?= $this->Html->link("Équipe", ["controller"=>"Sports", "action"=>"equipe"])?></li>
            <li class="<?php if($page=="tuto"){echo "active";}?>"><?= $this->Html->link("Tutoriels", ["controller"=>"Sports", "action"=>"tuto"])?></li>
            <li class="<?php if($page=="mention"){echo "active";}?>"><?= $this->Html->link("Mention", ["controller"=>"Sports", "action"=>"mention"])?></li>
      </ul>
        <ul class="mynavbarnavright nav navbar-nav navbar-right">
            <li><?= $this->Html->link("Déconnexion", ["controller"=>"Sports", "action"=>"logout"])?></li>
        </ul>
    </div>
</nav>

<nav id="nav_tmp" class="mynavbar navbar navbar-default">

    <div >
      <div class="mynavbarheader navbar-header">
        <!-- <a class="navbar-brand" href=""><?= $this->fetch('title') ?></a> -->
        <?= $this->Html->link("WorkItOut", ["controller"=>"Sports", "action"=>"index"], ["class" => "navbar-brand"])?>
      </div>
      <ul class="mynavbarnav nav navbar-nav">
            <li class="<?php if($page=="index"){echo "active";}?>"><?= $this->Html->link("Accueil", ["controller"=>"Sports", "action"=>"index"])?></li>
            <li class="<?php if($page=="moncompte"){echo "active";}?>"><?= $this->Html->link("Mon compte", ["controller"=>"Sports", "action"=>"moncompte"])?></li>
            <li class="<?php if($page=="seance"){echo "active";}?>"><?= $this->Html->link("Mes séances", ["controller"=>"Sports", "action"=>"seance"])?></li>
            <li class="<?php if($page=="objetsco"){echo "active";}?>"><?= $this->Html->link("Mes objets connectés", ["controller"=>"Sports", "action"=>"objetsco"])?></li>
            <li class="<?php if($page=="classements"){echo "active";}?>"><?= $this->Html->link("Classement", ["controller"=>"Sports", "action"=>"classements"])?></li>
            <li class="<?php if($page=="competition" || $page=="singlecompetition"){echo "active";}?>"><?= $this->Html->link("Compétitions", ["controller"=>"Sports", "action"=>"competition"])?></li>
            
            <li class="<?php if($page=="contact"){echo "active";}?>"><?= $this->Html->link("Contact", ["controller"=>"Sports", "action"=>"contact"])?></li>
            <li class="<?php if($page=="equipe"){echo "active";}?>"><?= $this->Html->link("Équipe", ["controller"=>"Sports", "action"=>"equipe"])?></li>
            <li class="<?php if($page=="tuto"){echo "active";}?>"><?= $this->Html->link("Tutoriels", ["controller"=>"Sports", "action"=>"tuto"])?></li>
            <li class="<?php if($page=="mention"){echo "active";}?>"><?= $this->Html->link("Mention", ["controller"=>"Sports", "action"=>"mention"])?></li>
      </ul>
        <ul class="mynavbarnavright nav navbar-nav navbar-right">
            <li><?= $this->Html->link("Déconnexion", ["controller"=>"Sports", "action"=>"logout"])?></li>
        </ul>
    </div>
</nav>
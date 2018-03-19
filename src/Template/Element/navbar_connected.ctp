<nav class="mynavbar navbar navbar-default">
    <div >
      <div class="mynavbarheader navbar-header">
        <a class="navbar-brand" href=""><?= $this->fetch('title') ?></a>
      </div>
      <ul class="mynavbarnav nav navbar-nav">
            <li><?= $this->Html->link("Accueil", ["controller"=>"Sports", "action"=>"index"])?></li>
            <li><?= $this->Html->link("Mon compte", ["controller"=>"Sports", "action"=>"moncompte"])?></li>
            <li><?= $this->Html->link("Mes séances", ["controller"=>"Sports", "action"=>"seance"])?></li>
            <li><?= $this->Html->link("Mes objets connectés", ["controller"=>"Sports", "action"=>"objetsco"])?></li>
            <li><?= $this->Html->link("Classement", ["controller"=>"Sports", "action"=>"classements"])?></li>
            <li><?= $this->Html->link("Compétitions", ["controller"=>"Sports", "action"=>"competition"])?></li>
            
            <li><?= $this->Html->link("Contact", ["controller"=>"Sports", "action"=>"contact"])?></li>
            <li><?= $this->Html->link("Équipe", ["controller"=>"Sports", "action"=>"equipe"])?></li>
            <li><?= $this->Html->link("Tutoriels", ["controller"=>"Sports", "action"=>"tuto"])?></li>
            <li><?= $this->Html->link("Mention", ["controller"=>"Sports", "action"=>"mention"])?></li>
      </ul>
        <ul class="mynavbarnavright nav navbar-nav navbar-right">
            <li><?= $this->Html->link("Déconnexion", ["controller"=>"Sports", "action"=>"logout"])?></li>
        </ul>
    </div>
</nav>
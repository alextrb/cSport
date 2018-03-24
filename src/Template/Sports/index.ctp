<?php
$this->assign('title', 'Accueil');?>


<div class="container" style="width: 1100px;">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <?= $this->Html->Link($this->Html->image('slider1.jpg',array('alt' => "seances", 'style' =>'width: 1100px;', "class"=>"imgs_index")), array("controller"=>"Sports", "action"=>'seance'), array("escape" => false)); ?>
        <div class="carousel-caption">
          <p>Organisez vos entraînements</p>
        </div>
      </div>

      <div class="item">
        <?= $this->Html->Link($this->Html->image('slider2.jpg',array('alt' => "seances", 'style' =>'width: 1100px;', "class"=>"imgs_index")), array("controller"=>"Sports", "action"=>'competition'), array("escape" => false)); ?>
        <div class="carousel-caption">
          <p>Participez à des compétitions</p>
        </div>
      </div>
    
      <div class="item">
        <?= $this->Html->Link($this->Html->image('slider3.jpg',array('alt' => "seances", 'style' =>'width: 1100px;', "class"=>"imgs_index")), array("controller"=>"Sports", "action"=>'classements'), array("escape" => false)); ?>
        <div class="carousel-caption">
          <p>Montrez votre supériorité !</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<?php echo $this->Html->Link("Rejoignez-nous !", array("controller"=>"Sports", "action"=>"login"), array('class' => 'btn_index btn btn-success')); ?>





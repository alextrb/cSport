<?php
$this->assign('title', 'Accueil');?>


<div id="div_carousel" class="container" style="width: 100%;">
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
        <div id="div_caption1">
          <p class="caption_text">Organisez vos séances</p>
            <?php echo $this->Html->Link("Connectez-vous !", array("controller"=>"Sports", "action"=>"login"), array('class' => 'btn_index btn btn-success', 'style' => 'margin-bottom: 60px;')); ?>
        </div>
      </div>

      <div class="item">
        <div id="div_caption2">
          <p class="caption_text">Participez à des compétitions</p>
            <?php echo $this->Html->Link("Connectez-vous !", array("controller"=>"Sports", "action"=>"login"), array('class' => 'btn_index btn btn-success', 'style' => 'margin-bottom: 60px;')); ?>
        </div>
      </div>
    
      <div class="item">
        <div id="div_caption3">
          <p class="caption_text">Montrez votre supériorité !</p>
            <?php echo $this->Html->Link("Connectez-vous !", array("controller"=>"Sports", "action"=>"login"), array('class' => 'btn_index btn btn-success', 'style' => 'margin-bottom: 60px;')); ?>
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
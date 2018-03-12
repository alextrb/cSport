<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    
    
    <?= $this->Html->script('jquery-3.3.1.js') ?>

    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->script('bootstrap.js') ?>
    
    <?= $this->Html->css('datatables.css') ?>
    <?= $this->Html->script('datatables.js') ?>
    
    <?= $this->Html->css('mainstyle.css') ?>
    <?= $this->Html->css('seance.css') ?>
    <?= $this->Html->css('classement.css') ?>
    <?= $this->Html->css('objetsco.css') ?>
    
    <?= $this->fetch('meta') ?> <!--Ne pas toucher les 3 lignes -->
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?php 
        if ($this->request->session()->read('Auth.User.id'))
        {
            echo $this->element('navbar_connected');
        }
        else
        {
            echo $this->element('navbar_disconnected');
        }
    ?>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?> <!--Ne pas toucher, correspond à la vue-->
    </div>
    <footer>
    </footer>
</body>
</html>

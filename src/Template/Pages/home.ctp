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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?php
        echo $this->Html->css("https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css");
        echo $this->Html->css("https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css");
        
        $session = $this->getRequest()->getSession();
        $nome = $session->read('Auth.User.nome');
        $id = $session->read('Auth.User.id');

    ?>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('home.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body class="home">
<nav class="navbar navbar-default" data-topbar role="navigation">
        <ul class="nav nav-tabs" style="border: 0px solid black; padding-top: 3px;">
            <li>
            <h3 style="border: 0px solid black; padding-top : 2.5px; margin-bottom: -10px;"> Home </h3>
                <h3 style="border: 0px solid black; padding-top : 2.5px; margin-bottom: -10px;">
                    <?= $this->Html->link($this->fetch('title'),['action' => 'index']) ?>
                </h3>
            </li>
            <!-- <li class="dropdown" style="padding-right: 12px;">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actions <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li></?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
                    <li></?= $this->Html->link(__('New Estado'), ['controller' => 'Estados', 'action' => 'add']) ?></li>
                    <li></?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                    <li></?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
                    <li></?= $this->Html->link(__('List Estados'), ['controller' => 'Estados', 'action' => 'index']) ?></li>
                    <li></?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                </ul>
            </li> -->
            <!-- <pre> -->
            <li class="dropdown nav navbar-nav navbar-right" style="padding-right: 12px;">
                    <?php if ($nome) { ?>
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user" style="padding-right: 4px;"></i>
                            <?= h($nome); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php echo $this->Html->link(__('Logout'), 
                                ['controller' => 'Users', 'action' => 'logout']) ?>
                            </li>
                            <li class="actions">
                                <?= $this->Html->link(__('Perfil'), ['controller' => 'Users', 'action' => 'view', $id]) ?>
                            </li>
                    <?php } else { ?>
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Login
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                        <li>
                            <?php echo $this->Html->link(__('Login'), 
                            ['controller' => 'Users', 'action' => 'login']); ?>
                        </li>
                    </ul>
                    <li class="nav navbar-nav navbar-right">
                        <?= $this->Html->link('Registrar',['controller' => 'users', 'action' => 'add']) ?>
                    </li>
                    <?php } ?>
            </li>
        </ul>
    </nav>
    <header class="row">
        <div class="header-image"><?= $this->Html->image('cake.logo.svg') ?></div>
        <div class="header-title">
            <h1>Welcome to CakePHP <?= Configure::version() ?> Red Velvet. Build fast. Grow solid.</h1>
        </div>
        
    </header>
    <div style="border: 0px solid black; width: 110px; margin-left: 91.5%; margin-top: -20%;">
        <i class="fas fa-arrow-up fa-4x" style="margin-left: 20px;"></i>
        <div>
        Aqui ficam as funções para login, e administração de seu perfil.
        </div>
    </div>
    
    <footer>
        <?php 
            echo $this->Html->script("https://code.jquery.com/jquery-3.4.1.js");
            echo $this->Html->script("https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js");
            echo $this->Html->script("https://kit.fontawesome.com/1b6711c3e7.js");
        ?>
    </footer>
</body>
</html>
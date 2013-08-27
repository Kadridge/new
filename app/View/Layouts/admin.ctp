<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <![endif]-->
	<?php
		echo $this->Html->meta('icon');

		//  echo $this->Html->css('bootstrap-theme');
                echo $this->Html->css('bootstrap');
                echo $this->Html->css('new');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                
                echo $this->Html->script('jquery-1.10.2');
	?>
</head>
<body>
    <div class="container">
     <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin New</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="<?php if($this->params['controller'] == 'posts' && $this->params['action'] == 'index'){echo 'active';} ?>"><?php echo $this->Html->link('Home', array('controller' => 'posts', 'action' => 'index', 'admin'=>false)); ?></li>
            <li class="<?php if($this->params['controller'] == 'posts' && $this->params['action'] == 'index'){echo 'active';} ?>"><?php echo $this->Html->link('Edit Post', array('controller' => 'posts', 'action' => 'index')); ?></li>
            <li class="<?php if($this->params['controller'] == 'users' && $this->params['action'] == 'index'){echo 'active';} ?>"><?php echo $this->Html->link('Edit User', array('controller' => 'users', 'action' => 'index')); ?></li>
            <li class="<?php if($this->params['controller'] == 'groups' && $this->params['action'] == 'index'){echo 'active';} ?>"><?php echo $this->Html->link('Edit Group', array('controller' => 'groups', 'action' => 'index')); ?></li>
            <?php if(AuthComponent::user('id')): ?>
            <li class=""><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false)); ?></li>
            <li class=""><?php echo $this->Html->link('Profile', array('controller' => 'users', 'action' => 'edit')); ?></li>
            <?php else: ?>
            <li class=""><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); ?></li>
            <li class=""><?php echo $this->Html->link('SignUp', array('controller' => 'users', 'action' => 'signup')); ?></li>
            <?php endif; ?>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->
      <?php echo $this->Session->flash(); ?>
      <?php echo $this->fetch('content'); ?>

      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div><!--/.container-->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<?php //echo $this->element('sql_dump');
                echo $this->Html->script('bootstrap');
                echo $this->Html->script('holder');
                echo $this->Html->script('new');
                echo $this->Html->script('html5shiv.js');
                echo $this->Html->script('respond.min.js');
        ?>
    	<?php //echo $this->element('sql_dump');
        ?>
</body>
</html>

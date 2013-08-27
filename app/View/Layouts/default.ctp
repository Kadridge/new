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
      <?php echo !empty($this->request->params['admin']) ? $this->element('menuadmin') : $this->element('menu'); ?>
        
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

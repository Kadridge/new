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
            <?php if(AuthComponent::user('id')): ?>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Media->image(AuthComponent::user('thumb'), 15, 15); ?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li class=""><?php echo $this->Html->link("<span class='glyphicon glyphicon-user'></span>"." ".AuthComponent::user('username') . "" . "'s profile", array('controller' => 'users', 'action' => 'edit'), array('escape'=>false)); ?></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li class=""><?php echo $this->Html->link('<span class="glyphicon glyphicon-off"></span>  Logout', array('controller' => 'users', 'action' => 'logout'), array('escape' => false)); ?></li>
                    <li><a href="#">Example</a></li>
                  </ul>
                </li>
            <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-wrench"></span><b class="caret"></b></a>
                  <ul class="dropdown-menu">
            <li class=""><?php echo $this->Html->link('Edit Post', array('controller' => 'posts', 'action' => 'index','admin'=>true)); ?></li>
            <li class=""><?php echo $this->Html->link('Edit User', array('controller' => 'users', 'action' => 'index','admin'=>true)); ?></li>
            <li class=""><?php echo $this->Html->link('Edit Group', array('controller' => 'groups', 'action' => 'index','admin'=>true)); ?></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
            <?php endif; ?>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->
<h2>Connection: </h2>
<?php
    echo $this->Form->create('User');
    echo $this->Form->input('username', array('class'=>'form-control'));
    echo $this->Form->input('password', array('class'=>'form-control'));
    echo $this->Html->link('Forgotten password ?', array('action' => 'password', 'controller'=>'users'));
    $options = array(
    'label' => 'Login',
     'class' => 'btn btn-default'
    );
    
    echo $this->Form->end($options);
?>
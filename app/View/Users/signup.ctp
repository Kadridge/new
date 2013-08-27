<h2>Signup</h2>

<?php
    echo $this->Form->create('User');
    echo $this->Form->input('username', array('class'=>'form-control'));
    echo $this->Form->input('mail', array('class'=>'form-control'));
    echo $this->Form->input('password', array('class'=>'form-control'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    
    $options = array(
    'label' => 'Signup',
     'class' => 'btn btn-default'
    );
    
    echo $this->Form->end($options);
?>
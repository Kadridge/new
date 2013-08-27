<h1>Edit User</h1>
<?php
    echo $this->Form->create('User');
    echo $this->Form->input('username', array('label'=>'Username'));
    echo $this->Form->input('firstname', array('label'=>'Firstname'));
    echo $this->Form->input('lastname', array('label'=>'Lastname'));
    echo $this->Form->input('pass1', array('label'=>'Enter your password', 'type'=>'password'));
    echo $this->Form->input('pass2', array('label'=>'Confirm your password', 'type'=>'password'));
    //echo $this->Form->input('body', array('rows' => '3', 'id' => 'editor','class' => 'form-control'));
    echo $this->Form->end('Save User');
?>
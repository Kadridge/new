<h2>Password Forgotten</h2>

<?php echo $this->Form->create('User');
      echo $this->Form->input('mail', array('label'=>'Email used for the inscriptions'));
      echo $this->Form->end('Submit');
?>
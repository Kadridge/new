<h1>Edit Group</h1>
<?php
    //echo $this->Media->iframe('Post', $this->request->data['Post']['id']);
    echo $this->Form->create('Group');
    echo $this->Form->input('name');
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->input('level', array('label' => 'Authorization level ', 'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10), 'empty' => 'choose one'));
    echo $this->Form->end('Save Post');
?>
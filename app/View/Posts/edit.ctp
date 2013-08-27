<h1>Edit Post</h1>
<?php
    //echo $this->Media->iframe('Post', $this->request->data['Post']['id']);
    echo $this->Form->create('Post');
    echo $this->Form->input('title');
    echo $this->Media->ckeditor('body', array('label' => 'Content'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->input('active', array('label' => 'Active ?', 'value' => 0, 'type' => 'checkbox'));
    echo $this->Form->end('Save Post');
?>
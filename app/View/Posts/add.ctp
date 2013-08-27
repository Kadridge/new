<h1>Add Post</h1>
<?php
echo $this->Media->iframe('Post', $this->request->data['Post']['id']);
echo $this->Form->create('Post');
echo $this->Form->input('title', array('label' => 'Title', 'class' => 'form-control'));
echo $this->Form->input('body', array('label' => 'Content'));

$options = array(
    'label' => 'Save Post',
    'class' => 'btn btn-primary'
);

echo $this->Form->end('Save');
?>
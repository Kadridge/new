<h1>Edit Post</h1>
<?php
    //echo $this->Media->iframe('Post', $this->request->data['Post']['id']);
    echo $this->Form->create('Post');
    echo $this->Form->input('title');
    echo $this->Media->ckeditor('body', array('label' => 'Content'));
    echo $this->Form->input('tags', array('label' => 'Tags separate by ;', 'type' => 'text')); ?>
<?php foreach ($tags as $tag): ?>
<span class="label label-primary tag">[<?php echo $this->Html->link('x', array('action'=>'delTag', $tag['PostTag']['id'])); ?>] <?php echo $tag['Tag']['name']; ?></span>
<?php endforeach; ?>
    
<?php
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->input('active', array('label' => 'Active ?', 'value' => 0, 'type' => 'checkbox'));
    echo $this->Form->end('Save Post');
?>

<script>
$( document ).ready(function() {
    $('.tag a').click(function(){
        var e = $(this);
        $.get(e.attr('href'));
        e.parent().fadeOut();
        return false;
    })
});
</script>
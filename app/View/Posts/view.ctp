<?php //debug($post); die(); ?>
<div class="container">
    <div class="page-header">
        <h1><?php echo $this->Media->image($post['User']['Thumb']['file'], 100, 100, array('class'=>'img-circle')); ?><?php echo $post['Post']['title']; ?><small> by <?php echo $post['User']['username']; ?></small></h1>
        <div class="well">
            <?php echo $this->Media->image($post['Post']['thumb'], 1120, 480); ?>
            <p><small>Created: <?php echo $post['Post']['created']; ?></small></p>
            <p><?php echo $post['Post']['body']; ?></p>   
        </div>
    </div>
</div>
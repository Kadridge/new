<?php //debug($post); die(); ?>
<div class="container">
    <div class="page-header">
        <h1><?php echo $this->Media->image($post['User']['Thumb']['file'], 100, 100, array('class'=>'img-circle')); ?><?php echo $post['Post']['title']; ?><small> by <?php echo $post['User']['username']; ?></small></h1>
    <div class="row">
            <div class="col-12">
             <div class="well">
                <?php echo $this->Media->image($post['Post']['thumb'], 1120, 480); ?>
            <div class="row">
                <div class="col-lg-9 bodypostview">
                    <div class="well white">
                    <p><small>Created: <?php echo $post['Post']['created']; ?></small></p>
                    <p><?php echo $post['Post']['body']; ?></p> 
                    </div>
                </div>
                <div class="col-lg-3 sidebarpostview">
                    <div class="well white">
                        <h4>About the Author:</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
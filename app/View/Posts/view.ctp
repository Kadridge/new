<?php //debug($post); die(); ?>
<div class="container">
    <div class="page-header">
        <h1><?php echo $post['Post']['title']; ?><small> by <?php echo $post['User']['username']; ?></small></h1>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="well white">
                            <h4><span class="glyphicon glyphicon-user"></span> About <?php echo $post['User']['username']; ?>:</h4>
                            <?php echo $this->Media->image($post['User']['Thumb']['file'], 80, 80, array('class'=>'img-thumbnail')); ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="well white">
                            <h4><span class="glyphicon glyphicon-tags"></span> Tags:</h4>
                            <?php foreach($post['Tag'] as $tag): ?>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-tag"></span>'.''.$tag['name'].''.'&nbsp;', array('controller'=>'posts','action'=>'tag', $tag['name']), array('escape'=>false)) ?> 
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
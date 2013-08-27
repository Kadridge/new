<h1><?php echo h($user['User']['username']); ?></h1>

<p><small>Created: <?php echo $user['User']['created']; ?></small></p>

<h2>Posts:</h2>

<?php foreach ($user['Post'] as $post): ?>
    <?php echo $this->Html->link($post['title'], array('controller'=>'posts','action' => 'view', $post['id'])); ?>
<?php endforeach; ?>

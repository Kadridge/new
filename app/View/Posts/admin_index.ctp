<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Add Post', array('action' => 'edit'), array('class' => 'btn btn-large btn-primary')); ?></p>
<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Actions</th>
        <th>Statut</th>
        <th>Created</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->
    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $post['Post']['id']),
                    array('class'=>'btn btn-info', 'escape' => false)); ?>
            <?php echo $this->Html->link('<span class="glyphicon glyphicon-eye-open"></span>', array('action' => 'view', $post['Post']['id']),
                    array('class'=>'btn btn-success', 'escape' => false)); ?>
            <?php echo $this->Form->PostLink(
                '<span class="glyphicon glyphicon-trash"></span>',
                array('action' => 'delete', $post['Post']['id']),
                array('class'=>'btn btn-danger', 'escape' => false),
                __("Sure you want to delete this post ?"));
            ?>
        </td>
        <td>
            <?php if($post['Post']['active'] == 1): ?>
                <span class="label label-success">Online</span>
                <?php elseif ($post['Post']['active'] == 0):?>
                <span class="label label-danger">Offline</span>
                <?php else: ?>
                <span class="label label-warning">Draft</span>
                <? endif; ?>
        </td>
        <td>
            <?php echo $post['Post']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
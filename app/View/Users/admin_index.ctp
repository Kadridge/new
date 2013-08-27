<h1>User</h1>
<p><?php echo $this->Html->link('Add User', array('action' => 'add'), array('class' => 'btn btn-large btn-primary')); ?></p>
<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Role</th>
        <th>Actions</th>
        <th>Status</th>
        <th>Created</th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($user['User']['username'], array('action' => 'view', $user['User']['id'])); ?>
        </td>
        <td>
            <?php echo $user['Group']['name']; ?>
        </td>
        <td>
            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $user['User']['id']),
                    array('class'=>'btn btn-info', 'escape' => false)); ?>
            <?php echo $this->Html->link('<span class="glyphicon glyphicon-eye-open"></span>', array('action' => 'view', $user['User']['id']),
                    array('class'=>'btn btn-success', 'escape' => false)); ?>
            <?php echo $this->Form->PostLink(
                '<span class="glyphicon glyphicon-trash"></span>',
                array('action' => 'delete', $user['User']['id']),
                array('class'=>'btn btn-danger', 'escape' => false),
                __("Sure you want to delete this user ?"));
            ?>
        </td>
        <td>
            <?php if($user['User']['active'] == 1): ?>
                <span class="label label-success">Active</span>
                <?php elseif ($user['User']['active'] == 0):?>
                <span class="label label-danger">Inactive</span>
                <? endif; ?>
        </td>
        <td>
            <?php echo $user['User']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
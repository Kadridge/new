<h1>Groups</h1>
<p><?php echo $this->Html->link('Add Group', array('action' => 'add', 'controller' => 'groups'), array('class' => 'btn btn-large btn-primary')); ?></p>
<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Group name</th>
        <th>Level</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>


    <?php foreach ($groups as $group): ?>
    <tr>
        <td><?php echo $group['Group']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($group['Group']['name'], array('action' => 'view', $group['Group']['id'])); ?>
        </td>
        <td>
            <?php echo $group['Group']['level']; ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $group['Group']['id']),
                array('class'=>'btn btn-danger'),
                __('Sure you want to delete # %s?', $group['Group']['name']));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $group['Group']['id']),
                    array('class'=>'btn btn-info')); ?>
        </td>
        <td>
            <?php echo $group['Group']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
<p>
    <strong>Hi <?php echo $username; ?></strong>
</p>

<p>
    A request has been set to reset your password, if it's yours, please click on the link below:
</p>
<p>
    <?php echo $this->Html->link('Reset my password', $this->Html->url($link,true)); ?>
</p>
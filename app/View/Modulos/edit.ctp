<div class="modulos form">
<?php echo $this->Form->create('Modulo');?>
	<fieldset>
		<legend><?php echo __('Edit Modulo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('denominacion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Modulo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Modulo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Modulos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Modulo Usuarios'), array('controller' => 'modulo_usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modulo Usuario'), array('controller' => 'modulo_usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zmenus'), array('controller' => 'zmenus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zmenu'), array('controller' => 'zmenus', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zmenu Usuarios'), array('controller' => 'zmenu_usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zmenu Usuario'), array('controller' => 'zmenu_usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>

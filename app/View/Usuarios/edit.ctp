<div class="usuarios form">
<?php echo $this->Form->create('Usuario');?>
	<fieldset>
		<legend><?php echo __('Edit Usuario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dependencia_id');
		echo $this->Form->input('usuario');
		echo $this->Form->input('clave');
		echo $this->Form->input('nivel');
		echo $this->Form->input('email');
		echo $this->Form->input('enlinea');
		echo $this->Form->input('entrada_actualizada');
		echo $this->Form->input('activo');
		echo $this->Form->input('nombre_completo');
		echo $this->Form->input('cedula_identidad');
		echo $this->Form->input('dependencia_orig_id');
		echo $this->Form->input('Modulo');
		echo $this->Form->input('Zmenu');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Usuario.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Usuario.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Dependencias'), array('controller' => 'dependencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dependencia'), array('controller' => 'dependencias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modulos'), array('controller' => 'modulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modulo'), array('controller' => 'modulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zmenus'), array('controller' => 'zmenus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zmenu'), array('controller' => 'zmenus', 'action' => 'add')); ?> </li>
	</ul>
</div>

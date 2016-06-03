<div class="requeequiherproductos form">
<?php echo $this->Form->create('Requeequiherproducto');?>
	<fieldset>
		<legend><?php echo __('Add Requeequiherproducto'); ?></legend>
	<?php
		echo $this->Form->input('requeequiherdetalle_id');
		echo $this->Form->input('cantidad');
		echo $this->Form->input('producto_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Requeequiherproductos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Requeequiherdetalles'), array('controller' => 'requeequiherdetalles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requeequiherdetalle'), array('controller' => 'requeequiherdetalles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>

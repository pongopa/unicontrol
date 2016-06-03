<div class="requemateproductos form">
<?php echo $this->Form->create('Requemateproducto');?>
	<fieldset>
		<legend><?php echo __('Add Requemateproducto'); ?></legend>
	<?php
		echo $this->Form->input('requematedetalle_id');
		echo $this->Form->input('cantidad');
		echo $this->Form->input('producto_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Requemateproductos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Requematedetalles'), array('controller' => 'requematedetalles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requematedetalle'), array('controller' => 'requematedetalles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>

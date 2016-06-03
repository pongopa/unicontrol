<div class="ordencomprasproductos form">
<?php echo $this->Form->create('Ordencomprasproducto');?>
	<fieldset>
		<legend><?php echo __('Add Ordencomprasproducto'); ?></legend>
	<?php
		echo $this->Form->input('ordencompra_id');
		echo $this->Form->input('cantidad');
		echo $this->Form->input('producto_id');
		echo $this->Form->input('precio_unitario');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ordencomprasproductos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Ordencompras'), array('controller' => 'ordencompras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordencompra'), array('controller' => 'ordencompras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>

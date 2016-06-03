<div class="ordencomprasproductos view">
<h2><?php  echo __('Ordencomprasproducto');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ordencomprasproducto['Ordencomprasproducto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordencompra'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordencomprasproducto['Ordencompra']['numero_orden_compra'], array('controller' => 'ordencompras', 'action' => 'view', $ordencomprasproducto['Ordencompra']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($ordencomprasproducto['Ordencomprasproducto']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Producto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ordencomprasproducto['Producto']['denominacion'], array('controller' => 'productos', 'action' => 'view', $ordencomprasproducto['Producto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio Unitario'); ?></dt>
		<dd>
			<?php echo h($ordencomprasproducto['Ordencomprasproducto']['precio_unitario']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ordencomprasproducto'), array('action' => 'edit', $ordencomprasproducto['Ordencomprasproducto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ordencomprasproducto'), array('action' => 'delete', $ordencomprasproducto['Ordencomprasproducto']['id']), null, __('Are you sure you want to delete # %s?', $ordencomprasproducto['Ordencomprasproducto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordencomprasproductos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordencomprasproducto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ordencompras'), array('controller' => 'ordencompras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordencompra'), array('controller' => 'ordencompras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>

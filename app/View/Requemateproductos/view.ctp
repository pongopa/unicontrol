<div class="requemateproductos view">
<h2><?php  echo __('Requemateproducto');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($requemateproducto['Requemateproducto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Requematedetalle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($requemateproducto['Requematedetalle']['numero_requerimiento'], array('controller' => 'requematedetalles', 'action' => 'view', $requemateproducto['Requematedetalle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($requemateproducto['Requemateproducto']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Producto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($requemateproducto['Producto']['denominacion'], array('controller' => 'productos', 'action' => 'view', $requemateproducto['Producto']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Requemateproducto'), array('action' => 'edit', $requemateproducto['Requemateproducto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Requemateproducto'), array('action' => 'delete', $requemateproducto['Requemateproducto']['id']), null, __('Are you sure you want to delete # %s?', $requemateproducto['Requemateproducto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Requemateproductos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requemateproducto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requematedetalles'), array('controller' => 'requematedetalles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requematedetalle'), array('controller' => 'requematedetalles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>

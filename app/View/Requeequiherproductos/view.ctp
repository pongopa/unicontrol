<div class="requeequiherproductos view">
<h2><?php  echo __('Requeequiherproducto');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($requeequiherproducto['Requeequiherproducto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Requeequiherdetalle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($requeequiherproducto['Requeequiherdetalle']['numero_requerimiento'], array('controller' => 'requeequiherdetalles', 'action' => 'view', $requeequiherproducto['Requeequiherdetalle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($requeequiherproducto['Requeequiherproducto']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Producto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($requeequiherproducto['Producto']['denominacion'], array('controller' => 'productos', 'action' => 'view', $requeequiherproducto['Producto']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Requeequiherproducto'), array('action' => 'edit', $requeequiherproducto['Requeequiherproducto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Requeequiherproducto'), array('action' => 'delete', $requeequiherproducto['Requeequiherproducto']['id']), null, __('Are you sure you want to delete # %s?', $requeequiherproducto['Requeequiherproducto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Requeequiherproductos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requeequiherproducto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requeequiherdetalles'), array('controller' => 'requeequiherdetalles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requeequiherdetalle'), array('controller' => 'requeequiherdetalles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>

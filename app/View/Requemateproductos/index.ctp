<?php
$page = $this->Paginator->current();
$this->Paginator->options(array('update' => 'principal'));
?>
<div class="requemateproductos index">
	<h2><?php echo __('Requemateproductos');?></h2>
	<table cellpadding="0" cellspacing="0" class="grilla">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('requematedetalle_id');?></th>
			<th><?php echo $this->Paginator->sort('cantidad');?></th>
			<th><?php echo $this->Paginator->sort('producto_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($requemateproductos as $requemateproducto): ?>
	<tr>
		<td><?php echo h($requemateproducto['Requemateproducto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($requemateproducto['Requematedetalle']['numero_requerimiento'], array('controller' => 'requematedetalles', 'action' => 'view', $requemateproducto['Requematedetalle']['id'])); ?>
		</td>
		<td><?php echo h($requemateproducto['Requemateproducto']['cantidad']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($requemateproducto['Producto']['denominacion'], array('controller' => 'productos', 'action' => 'view', $requemateproducto['Producto']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $requemateproducto['Requemateproducto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $requemateproducto['Requemateproducto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $requemateproducto['Requemateproducto']['id']), null, __('Are you sure you want to delete # %s?', $requemateproducto['Requemateproducto']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Requemateproducto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Requematedetalles'), array('controller' => 'requematedetalles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requematedetalle'), array('controller' => 'requematedetalles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>

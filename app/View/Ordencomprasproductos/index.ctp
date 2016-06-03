<?php
$page = $this->Paginator->current();
$this->Paginator->options(array('update' => 'principal'));
?>
<div class="ordencomprasproductos index">
	<h2><?php echo __('Ordencomprasproductos');?></h2>
	<table cellpadding="0" cellspacing="0" class="grilla">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('ordencompra_id');?></th>
			<th><?php echo $this->Paginator->sort('cantidad');?></th>
			<th><?php echo $this->Paginator->sort('producto_id');?></th>
			<th><?php echo $this->Paginator->sort('precio_unitario');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($ordencomprasproductos as $ordencomprasproducto): ?>
	<tr>
		<td><?php echo h($ordencomprasproducto['Ordencomprasproducto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ordencomprasproducto['Ordencompra']['numero_orden_compra'], array('controller' => 'ordencompras', 'action' => 'view', $ordencomprasproducto['Ordencompra']['id'])); ?>
		</td>
		<td><?php echo h($ordencomprasproducto['Ordencomprasproducto']['cantidad']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ordencomprasproducto['Producto']['denominacion'], array('controller' => 'productos', 'action' => 'view', $ordencomprasproducto['Producto']['id'])); ?>
		</td>
		<td><?php echo h($ordencomprasproducto['Ordencomprasproducto']['precio_unitario']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ordencomprasproducto['Ordencomprasproducto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ordencomprasproducto['Ordencomprasproducto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ordencomprasproducto['Ordencomprasproducto']['id']), null, __('Are you sure you want to delete # %s?', $ordencomprasproducto['Ordencomprasproducto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ordencomprasproducto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ordencompras'), array('controller' => 'ordencompras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ordencompra'), array('controller' => 'ordencompras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>

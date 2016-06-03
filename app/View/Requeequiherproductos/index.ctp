<?php
$page = $this->Paginator->current();
$this->Paginator->options(array('update' => 'principal'));
?>
<div class="requeequiherproductos index">
	<h2><?php echo __('Requeequiherproductos');?></h2>
	<table cellpadding="0" cellspacing="0" class="grilla">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('requeequiherdetalle_id');?></th>
			<th><?php echo $this->Paginator->sort('cantidad');?></th>
			<th><?php echo $this->Paginator->sort('producto_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($requeequiherproductos as $requeequiherproducto): ?>
	<tr>
		<td><?php echo h($requeequiherproducto['Requeequiherproducto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($requeequiherproducto['Requeequiherdetalle']['numero_requerimiento'], array('controller' => 'requeequiherdetalles', 'action' => 'view', $requeequiherproducto['Requeequiherdetalle']['id'])); ?>
		</td>
		<td><?php echo h($requeequiherproducto['Requeequiherproducto']['cantidad']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($requeequiherproducto['Producto']['denominacion'], array('controller' => 'productos', 'action' => 'view', $requeequiherproducto['Producto']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $requeequiherproducto['Requeequiherproducto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $requeequiherproducto['Requeequiherproducto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $requeequiherproducto['Requeequiherproducto']['id']), null, __('Are you sure you want to delete # %s?', $requeequiherproducto['Requeequiherproducto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Requeequiherproducto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Requeequiherdetalles'), array('controller' => 'requeequiherdetalles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requeequiherdetalle'), array('controller' => 'requeequiherdetalles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
	</ul>
</div>

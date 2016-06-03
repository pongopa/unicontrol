<div class="usuarios index">
	<h2><?php echo __('Usuarios');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('dependencia_id');?></th>
			<th><?php echo $this->Paginator->sort('usuario');?></th>
			<th><?php echo $this->Paginator->sort('clave');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('nivel');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('enlinea');?></th>
			<th><?php echo $this->Paginator->sort('entrada_actualizada');?></th>
			<th><?php echo $this->Paginator->sort('activo');?></th>
			<th><?php echo $this->Paginator->sort('nombre_completo');?></th>
			<th><?php echo $this->Paginator->sort('cedula_identidad');?></th>
			<th><?php echo $this->Paginator->sort('dependencia_orig_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($usuarios as $usuario): ?>
	<tr>
		<td><?php echo h($usuario['Usuario']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($usuario['Dependencia']['denominacion'], array('controller' => 'dependencias', 'action' => 'view', $usuario['Dependencia']['id'])); ?>
		</td>
		<td><?php echo h($usuario['Usuario']['usuario']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['clave']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['created']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['modified']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['nivel']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['email']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['enlinea']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['entrada_actualizada']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['activo']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['nombre_completo']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['cedula_identidad']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['dependencia_orig_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Dependencias'), array('controller' => 'dependencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dependencia'), array('controller' => 'dependencias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modulos'), array('controller' => 'modulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modulo'), array('controller' => 'modulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zmenus'), array('controller' => 'zmenus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zmenu'), array('controller' => 'zmenus', 'action' => 'add')); ?> </li>
	</ul>
</div>

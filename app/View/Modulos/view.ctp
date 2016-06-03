<div class="modulos view">
<h2><?php  echo __('Modulo');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($modulo['Modulo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominacion'); ?></dt>
		<dd>
			<?php echo h($modulo['Modulo']['denominacion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Modulo'), array('action' => 'edit', $modulo['Modulo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Modulo'), array('action' => 'delete', $modulo['Modulo']['id']), null, __('Are you sure you want to delete # %s?', $modulo['Modulo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Modulos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modulo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modulo Usuarios'), array('controller' => 'modulo_usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modulo Usuario'), array('controller' => 'modulo_usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zmenus'), array('controller' => 'zmenus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zmenu'), array('controller' => 'zmenus', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zmenu Usuarios'), array('controller' => 'zmenu_usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zmenu Usuario'), array('controller' => 'zmenu_usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Modulo Usuarios');?></h3>
	<?php if (!empty($modulo['ModuloUsuario'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Modulo Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($modulo['ModuloUsuario'] as $moduloUsuario): ?>
		<tr>
			<td><?php echo $moduloUsuario['id'];?></td>
			<td><?php echo $moduloUsuario['modulo_id'];?></td>
			<td><?php echo $moduloUsuario['usuario_id'];?></td>
			<td><?php echo $moduloUsuario['activo'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'modulo_usuarios', 'action' => 'view', $moduloUsuario['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'modulo_usuarios', 'action' => 'edit', $moduloUsuario['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'modulo_usuarios', 'action' => 'delete', $moduloUsuario['id']), null, __('Are you sure you want to delete # %s?', $moduloUsuario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Modulo Usuario'), array('controller' => 'modulo_usuarios', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Zmenus');?></h3>
	<?php if (!empty($modulo['Zmenu'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Modulo Id'); ?></th>
		<th><?php echo __('Deno Menu'); ?></th>
		<th><?php echo __('Nivel'); ?></th>
		<th><?php echo __('Id Menu'); ?></th>
		<th><?php echo __('Orden Ubicacion'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Idcapa'); ?></th>
		<th><?php echo __('Tipo Inst'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th><?php echo __('Principal'); ?></th>
		<th><?php echo __('Principal Dependencia'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($modulo['Zmenu'] as $zmenu): ?>
		<tr>
			<td><?php echo $zmenu['id'];?></td>
			<td><?php echo $zmenu['modulo_id'];?></td>
			<td><?php echo $zmenu['deno_menu'];?></td>
			<td><?php echo $zmenu['nivel'];?></td>
			<td><?php echo $zmenu['id_menu'];?></td>
			<td><?php echo $zmenu['orden_ubicacion'];?></td>
			<td><?php echo $zmenu['url'];?></td>
			<td><?php echo $zmenu['idcapa'];?></td>
			<td><?php echo $zmenu['tipo_inst'];?></td>
			<td><?php echo $zmenu['activo'];?></td>
			<td><?php echo $zmenu['principal'];?></td>
			<td><?php echo $zmenu['principal_dependencia'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'zmenus', 'action' => 'view', $zmenu['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'zmenus', 'action' => 'edit', $zmenu['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'zmenus', 'action' => 'delete', $zmenu['id']), null, __('Are you sure you want to delete # %s?', $zmenu['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Zmenu'), array('controller' => 'zmenus', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Zmenu Usuarios');?></h3>
	<?php if (!empty($modulo['ZmenuUsuario'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Zmenu Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Modulo Id'); ?></th>
		<th><?php echo __('Activo'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($modulo['ZmenuUsuario'] as $zmenuUsuario): ?>
		<tr>
			<td><?php echo $zmenuUsuario['id'];?></td>
			<td><?php echo $zmenuUsuario['zmenu_id'];?></td>
			<td><?php echo $zmenuUsuario['usuario_id'];?></td>
			<td><?php echo $zmenuUsuario['modulo_id'];?></td>
			<td><?php echo $zmenuUsuario['activo'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'zmenu_usuarios', 'action' => 'view', $zmenuUsuario['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'zmenu_usuarios', 'action' => 'edit', $zmenuUsuario['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'zmenu_usuarios', 'action' => 'delete', $zmenuUsuario['id']), null, __('Are you sure you want to delete # %s?', $zmenuUsuario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Zmenu Usuario'), array('controller' => 'zmenu_usuarios', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>

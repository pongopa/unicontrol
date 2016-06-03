<div class="usuarios view">
<h2><?php  echo __('Usuario');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dependencia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usuario['Dependencia']['denominacion'], array('controller' => 'dependencias', 'action' => 'view', $usuario['Dependencia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['usuario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clave'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['clave']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nivel'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['nivel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enlinea'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['enlinea']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entrada Actualizada'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['entrada_actualizada']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Activo'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['activo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Completo'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['nombre_completo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cedula Identidad'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['cedula_identidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dependencia Orig Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['dependencia_orig_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usuario'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dependencias'), array('controller' => 'dependencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dependencia'), array('controller' => 'dependencias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modulos'), array('controller' => 'modulos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modulo'), array('controller' => 'modulos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Zmenus'), array('controller' => 'zmenus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Zmenu'), array('controller' => 'zmenus', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Modulos');?></h3>
	<?php if (!empty($usuario['Modulo'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Denominacion'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($usuario['Modulo'] as $modulo): ?>
		<tr>
			<td><?php echo $modulo['id'];?></td>
			<td><?php echo $modulo['denominacion'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'modulos', 'action' => 'view', $modulo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'modulos', 'action' => 'edit', $modulo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'modulos', 'action' => 'delete', $modulo['id']), null, __('Are you sure you want to delete # %s?', $modulo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Modulo'), array('controller' => 'modulos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Zmenus');?></h3>
	<?php if (!empty($usuario['Zmenu'])):?>
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
		foreach ($usuario['Zmenu'] as $zmenu): ?>
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

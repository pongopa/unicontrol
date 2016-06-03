<div class="clientesucursas view">
<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php  echo __('Cliente sucursal');?></legend>
	<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientesucursa['Clientesucursa']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo h($clientesucursa['Cliente']['ruc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($clientesucursa['Clientesucursa']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Referencia'); ?></dt>
		<dd>
			<?php echo h($clientesucursa['Clientesucursa']['referencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conf Pai'); ?></dt>
		<dd>
			<?php echo h($clientesucursa['ConfPai']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conf Departamento'); ?></dt>
		<dd>
			<?php echo h($clientesucursa['ConfDepartamento']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conf Provincia'); ?></dt>
		<dd>
			<?php echo h($clientesucursa['ConfProvincia']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conf Distrito'); ?></dt>
		<dd>
			<?php echo h($clientesucursa['ConfDistrito']['denominacion']); ?>
			&nbsp;
		</dd>
	</dl>
		<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/clientesucursas/index/','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/clientesucursas/add','principal');"));?>
</fieldset>
</div>

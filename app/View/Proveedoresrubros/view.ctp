<div class="proveedoresrubros view">
<fieldset class="fieldset_marco">
		<legend class="titulo_marco"><?php  echo __('Proveedor rubro');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($proveedoresrubro['Proveedoresrubro']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proveedore'); ?></dt>
		<dd>
			<?php echo h($proveedoresrubro['Proveedore']['ruc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rubro'); ?></dt>
		<dd>
			<?php echo h($proveedoresrubro['Rubro']['denominacion']); ?>
			&nbsp;
		</dd>
	</dl>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Proveedoresrubros/index','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input', 'onclick'=>"ver_documento('/Proveedoresrubros/add','principal');"));?>
</fieldset>
</div>

<div class="proveedoresbancos view">
<fieldset class="fieldset_marco">
		<legend class="titulo_marco"><?php  echo __('Proveedor banco');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($proveedoresbanco['Proveedoresbanco']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proveedor'); ?></dt>
		<dd>
			<?php echo h($proveedoresbanco['Proveedore']['ruc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Banco'); ?></dt>
		<dd>
			<?php echo h($proveedoresbanco['Banco']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cuenta Bancaria'); ?></dt>
		<dd>
			<?php echo h($proveedoresbanco['Proveedoresbanco']['cuenta_bancaria']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Moneda'); ?></dt>
		<dd>
			<?php echo h($proveedoresbanco['Proveedoresbanco']['tipo_moneda']); ?>
			&nbsp;
		</dd>
	</dl>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Proveedoresbancos/index','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Proveedoresbancos/add','principal');"));?>
</fieldset>
</div>

<div class="proveedoresformapagos view">
<fieldset class="fieldset_marco">
		<legend class="titulo_marco"><?php  echo __('Proveedor forma pago');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($proveedoresformapago['Proveedoresformapago']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proveedore'); ?></dt>
		<dd>
			<?php echo h($proveedoresformapago['Proveedore']['ruc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Formapago'); ?></dt>
		<dd>
			<?php echo h($proveedoresformapago['Formapago']['denominacion']); ?>
			&nbsp;
		</dd>
	</dl>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Proveedoresformapagos/index','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input', 'onclick'=>"ver_documento('/Proveedoresformapagos/add','principal');"));?>
</fieldset>
</div>


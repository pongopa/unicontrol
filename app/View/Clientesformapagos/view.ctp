<div class="clientesformapagos view">
<fieldset class="fieldset_marco">
		<legend class="titulo_marco"><?php  echo __('Cliente forma pago');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientesformapago['Clientesformapago']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo h($clientesformapago['Cliente']['ruc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Formapago'); ?></dt>
		<dd>
			<?php echo h($clientesformapago['Formapago']['denominacion']); ?>
			&nbsp;
		</dd>
	</dl>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Clientesformapagos/index','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Clientesformapagos/add','principal');"));?>
</fieldset>
</div>

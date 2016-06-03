<div class="clientesrubros view">
<fieldset class="fieldset_marco">
		<legend class="titulo_marco"><?php  echo __('Cliente rubro');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientesrubro['Clientesrubro']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo h($clientesrubro['Cliente']['ruc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rubro'); ?></dt>
		<dd>
			<?php echo h($clientesrubro['Rubro']['denominacion']); ?>
			&nbsp;
		</dd>
	</dl>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Clientesrubros/index','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Clientesrubros/add','principal');"));?>
</fieldset>
</div>

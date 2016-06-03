<div class="monedas view">
<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php  echo __('Moneda');?></legend>
	<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($moneda['Moneda']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominacion'); ?></dt>
		<dd>
			<?php echo h($moneda['Moneda']['denominacion']); ?>
			&nbsp;
		</dd>
	</dl>
		<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/monedas/index/','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/monedas/add','principal');"));?>
</fieldset>
</div>

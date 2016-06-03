<div class="cargos view">
<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php  echo __('Cargo');?></legend>
	<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cargo['Cargo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominacion'); ?></dt>
		<dd>
			<?php echo h($cargo['Cargo']['denominacion']); ?>
			&nbsp;
		</dd>
	</dl>
		<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/cargos/index/','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/cargos/add','principal');"));?>
</fieldset>
</div>

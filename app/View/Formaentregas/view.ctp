<div class="formaentregas view">
<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php  echo __('Forma entrega');?></legend>
	<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($formaentrega['Formaentrega']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominacion'); ?></dt>
		<dd>
			<?php echo h($formaentrega['Formaentrega']['denominacion']); ?>
			&nbsp;
		</dd>
	</dl>
		<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/formaentregas/index/','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/formaentregas/add','principal');"));?>
</fieldset>
</div>

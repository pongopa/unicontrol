<div class="clientesrubros form">
<?php echo $this->Ajax->form('Clientesrubro','post',array('model'=>'Clientesrubro','url'=>'/Clientesrubros/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Cliente rubro'); ?></legend>
		<div id="principal_add"></div>
	<?php
		echo $this->Form->input('cliente_id', array('empty'=>'- -'));
		echo $this->Form->input('rubro_id', array('empty'=>'- -'));
	?>
	<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Clientesrubros/index','principal');"));?>
	</fieldset>
</div>

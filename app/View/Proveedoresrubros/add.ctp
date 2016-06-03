<div class="proveedoresrubros form">
<?php echo $this->Ajax->form('Proveedoresrubro','post',array('model'=>'Proveedoresrubro','url'=>'/Proveedoresrubros/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Proveedor rubro'); ?></legend>
		<div id="principal_add"></div>
	<?php
		echo $this->Form->input('proveedore_id', array('empty'=>'- -'));
		echo $this->Form->input('rubro_id', array('empty'=>'- -'));
	?>
	<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Proveedoresrubros/index','principal');"));?>
	</fieldset>
</div>

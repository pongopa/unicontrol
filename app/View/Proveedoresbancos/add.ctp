<div class="proveedoresbancos form">
<?php echo $this->Ajax->form('Proveedoresbanco','post',array('model'=>'Proveedoresbanco','url'=>'/Proveedoresbancos/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Proveedor banco'); ?></legend>
		<div id="principal_add"></div>
	<?php
		echo $this->Form->input('proveedore_id', array('empty'=>'- -'));
		echo $this->Form->input('banco_id', array('empty'=>'- -'));
		echo $this->Form->input('cuenta_bancaria');
		echo $this->Form->input('tipo_moneda');
	?>
	<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Proveedoresbancos/index','principal');"));?>
	</fieldset>
</div>

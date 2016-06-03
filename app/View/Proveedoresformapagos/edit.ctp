<div class="proveedoresformapagos form">
<?php echo $this->Ajax->form('Proveedoresformapago','post',array('model'=>'Proveedoresformapago','url'=>'/Proveedoresformapagos/edit','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Editar Proveedor forma pago'); ?></legend>
		<div id="principal_add"></div>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('proveedore_id');
		echo $this->Form->input('formapago_id');
	?>
	<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Proveedoresformapagos/index','principal');"));?>
	</fieldset>
</div>


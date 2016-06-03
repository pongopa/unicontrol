<div class="clientesformapagos form">
<?php echo $this->Ajax->form('Clientesformapago','post',array('model'=>'Clientesformapago','url'=>'/Clientesformapagos/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Cliente forma pago'); ?></legend>
		<div id="principal_add"></div>
	<?php
		echo $this->Form->input('cliente_id', array('empty'=>'- -'));
		echo $this->Form->input('formapago_id', array('empty'=>'- -'));
	?>
	<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Clientesformapagos/index','principal');"));?>
	</fieldset>
</div>

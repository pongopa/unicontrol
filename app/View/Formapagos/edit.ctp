<div class="formapagos form">
<?php echo $this->Ajax->form('Formapago','post',array('model'=>'Formapago','url'=>'/Formapagos/edit','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Editar Forma de pago'); ?></legend>
 		<div id="principal_add"></div>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('denominacion');
	?>
	</fieldset>
    <?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Formapagos/index','principal');"));?>
</div>

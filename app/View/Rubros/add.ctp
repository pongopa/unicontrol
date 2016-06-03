<div class="rubros form">
<?php echo $this->Ajax->form('Rubro','post',array('model'=>'Rubro','url'=>'/Rubros/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Rubro'); ?></legend>
 		<div id="principal_add"></div>
	<?php
		echo $this->Form->input('denominacion');
	?>
	</fieldset>
	<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Rubros/index','principal');"));?>
</div>




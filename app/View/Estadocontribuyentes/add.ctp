<div class="estadocontribuyentes form">
   	<?php echo $this->Ajax->form('Estadocontribuyente','post',array('model'=>'Estadocontribuyente','url'=>'/Estadocontribuyentes/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Estado contribuyente'); ?></legend>
		<div id="principal_add"></div>
	<?php
		echo $this->Form->input('denominacion');
	?>
	</fieldset>
            <?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
			<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
			<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Estadocontribuyentes/index/','principal');"));?>

</div>

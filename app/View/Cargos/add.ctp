<div class="cargos form">
   	<?php echo $this->Ajax->form('Cargo','post',array('model'=>'Cargo','url'=>'/cargos/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Cargo'); ?></legend>
		<div id="principal_add"></div>
	<?php
		echo $this->Form->input('denominacion');
	?>
        <?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
			<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
			<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/cargos/index/page:','principal');"));?>
	</fieldset>
</div>

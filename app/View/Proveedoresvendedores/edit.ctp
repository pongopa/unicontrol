<div class="proveedoresvendedores form">
<?php echo $this->Ajax->form('Proveedoresvendedore','post',array('model'=>'Proveedoresvendedore','url'=>'/Proveedoresvendedores/edit','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Editar Proveedor vendedor'); ?></legend>
		<div id="principal_add"></div>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('proveedore_id');
		echo $this->Form->input('nombres_y_apellidos');
		echo $this->Form->input('cell_1');
		echo $this->Form->input('cell_2');
		echo $this->Form->input('cell_3');
		echo $this->Form->input('email_1');
		echo $this->Form->input('email_2');
		echo $this->Form->input('email_3');
		echo $this->Form->input('email_4');
	?>
	<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Proveedoresvendedores/index','principal');"));?>
	</fieldset>
</div>

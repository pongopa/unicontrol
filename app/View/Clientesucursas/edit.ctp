<div class="clientesucursas form">
   	<?php echo $this->Ajax->form('Clientesucursa','post',array('model'=>'Clientesucursa','url'=>'/clientesucursas/edit','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Editar Cliente sucursal'); ?></legend>
		<div id="principal_add"></div>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cliente_id');
		echo $this->Form->input('direccion');
		echo $this->Form->input('referencia');
		echo $this->Form->input('conf_pai_id');
		echo $this->Form->input('conf_departamento_id');
		echo $this->Form->input('conf_provincia_id');
		echo $this->Form->input('conf_distrito_id');
	?>
        <?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
			<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
			<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/clientesucursas/index/page:','principal');"));?>
	</fieldset>
</div>

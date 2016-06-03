<div class="confProvincias form">
   	<?php echo $this->Ajax->form('ConfProvincia','post',array('model'=>'ConfProvincia','url'=>'/confProvincias/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Provincia'); ?></legend>
		<div id="principal_add"></div>
			<table width="80%">
				<tr><td>pais</td></tr>
				<tr><td><?php echo $this->Form->input('conf_pai_id',array('label'=>false,'empty'=>'- - SELECCIONE - -','onchange'=>"input_remoto('/confProvincias/select/1','select_departamento',this.value);")); ?></td></tr>
				<tr><td>departamento</td></tr>
				<tr><td id="select_departamento"><?php echo $this->Form->input('ConfProvincia.conf_departamento_id',array('label'=>false)); ?></td></tr>
			</table>
			<table>
				<tr><td>denominación</td></tr>
				<tr><td><?php echo $this->Form->input('denominacion',array('label'=>false)); ?></td></tr>
			</table>
        <?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
			<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
			<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/confProvincias/index/page:','principal');"));?>
	</fieldset>
</div>

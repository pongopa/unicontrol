<div class="confDistritos form">
   	<?php echo $this->Ajax->form('ConfDistrito','post',array('model'=>'ConfDistrito','url'=>'/confDistritos/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Distrito'); ?></legend>
		<div id="principal_add"></div>
		    <table width="80%">
				<tr><td>pais</td></tr>
				<tr><td><?php echo $this->Form->input('conf_pai_id',array('label'=>false,'empty'=>'- - SELECCIONE - -','onchange'=>"input_remoto('/confDistritos/select/1','select_estado',this.value);")); ?></td></tr>
				<tr><td>departamento</td></tr>
				<tr><td id="select_estado"><?php echo $this->Form->input('ConfDistrito.conf_departamento_id',array('label'=>false)); ?></td></tr>
				<tr><td>provincia</td></tr>
				<tr><td id="select_provincia"><?php echo $this->Form->input('ConfDistrito.conf_provincia_id',array('label'=>false)); ?></td></tr>
		    </table>
			<table>
				<tr><td>denominación</td></tr>
				<tr><td><?php echo $this->Form->input('denominacion',array('label'=>false)); ?></td></tr>
			</table>
        <?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
			<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
			<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/confDistritos/index/page:','principal');"));?>
	</fieldset>
</div>

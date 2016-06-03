<div class="confDepartamentos form">
   	<?php echo $this->Ajax->form('ConfDepartamento','post',array('model'=>'ConfDepartamento','url'=>'/confDepartamentos/edit','update'=>'principal_add'));?>
	<?php echo $this->Form->input('id',array('label'=>false)); ?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Editar Departamento'); ?></legend>
		<div id="principal_add"></div>
		<table width="80%">
					<tr><td>Pais</td></tr>
					<tr><td><?php echo $this->Form->input('conf_pai_id',array('label'=>false,'value'=>$this->request->data['ConfPai']['denominacion'],'readonly'=>'readonly', 'disabled'=>true)); ?></td></tr>
					<tr>
					<td>denominación</td>
					</tr>
					<tr><td><?php echo $this->Form->input('denominacion',array('label'=>false)); ?></td></tr>
		</table>
        <?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
			<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
			<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/confDepartamentos/index/page:','principal');"));?>
	</fieldset>
</div>

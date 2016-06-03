<div class="confDistritos form">
   	<?php echo $this->Ajax->form('ConfDistrito','post',array('model'=>'ConfDistrito','url'=>'/confDistritos/edit','update'=>'principal_add'));?>
	<?php echo $this->Form->input('id',array('label'=>false)); ?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Editar Distrito'); ?></legend>
		<div id="principal_add"></div>
			<table width="80%">
				<tr><td>pais</td></tr>
				<tr><td><?php echo $this->Form->input('conf_pai_id',array('label'=>false,'value'=>$this->request->data['ConfPai']['denominacion'],'readonly'=>'readonly', 'disabled'=>true)); ?></td></tr>
				<tr><td>departamento</td></tr>
				<tr><td id="select_estado"><?php echo $this->Form->input('ConfDistrito.conf_departamento_id',array('label'=>false,'value'=>$this->request->data['ConfDepartamento']['denominacion'],'readonly'=>'readonly', 'disabled'=>true)); ?></td></tr>
				<tr><td>provincia</td></tr>
				<tr><td id="select_provincia"><?php echo $this->Form->input('ConfDistrito.conf_provincia_id',array('label'=>false,'value'=>$this->request->data['ConfProvincia']['denominacion'],'readonly'=>'readonly', 'disabled'=>true)); ?></td></tr>
		    </table>
			<table>
				<tr>
					<td>denominación</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('denominacion',array('label'=>false)); ?></td>
				</tr>
		</table>
        <?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
			<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
			<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/confDistritos/index/page:','principal');"));?>
	</fieldset>
</div>

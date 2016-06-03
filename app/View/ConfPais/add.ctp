<div class="confPais form">
   	<?php echo $this->Ajax->form('ConfPai','post',array('model'=>'ConfPai','url'=>'/confPais/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Pais'); ?></legend>
		<div id="principal_add"></div>
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
			<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/confPais/index/page:','principal');"));?>
	</fieldset>
</div>

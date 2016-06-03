<div class="dependencias form">
<?php echo $this->Ajax->form('Dependencia','post',array('model'=>'Dependencia','url'=>'/dependencias/edit','update'=>'principal_add'));?>
<?php echo $this->Form->input('id',array('label'=>false)); ?>

	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php __('Entes adscritos'); ?></legend>
 		<?php echo $this->Form->input('institucion_id',array('label'=>false, 'type'=>'hidden')); ?>
 		<div id="principal_add"></div>

<table>
		<tr>
		    <td>Código</td>
			<td>Denominación</td>
			<td>Gaceta Registro</td>
		</tr>
		<tr>
		    <td><?php echo $this->Form->input('codigo_dependencia',array('style'=>'text-align:center','readonly'=>true, 'label'=>false, 'size'=>5, 'value'=>mascara($dependencias['Dependencia']['codigo_dependencia'],4))); ?></td>
			<td><?php echo $this->Form->input('denominacion',array('label'=>false, 'size'=>50)); ?></td>
			<td><?php echo $this->Form->input('gaceta_registro',array('label'=>false)); ?></td>
		</tr>
</table>
<table style="width:85%;">
		<tr>
			<td colspan="2">Actividad</td>
		</tr>
		<tr>
			<td colspan="2"><?php echo $this->Form->input('actividad',array('label'=>false, 'style'=>'width:100%')); ?></td>
		</tr>
		<tr>
			<td>Tipo de Ente adscrito</td>
		</tr>
		<tr>
			<td><?php echo $this->Form->input('tipo_dependencia',array('label'=>false,'type'=>'radio','legend'=>false,'separator'=>'  ','options'=>array('1'=>'Centralizada','2'=>'Descentralizada'))); ?></td>
		</tr>
</table>


	</fieldset>
<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/dependencias/index','principal');"));?>


</div>
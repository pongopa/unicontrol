<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php  __('Entes adscritos');?></legend>
<div class="dependencias view">
	<table cellpadding="0" cellspacing="0" id="view" <?php $i = 0; $class = ' class="altrow"';?>>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo" width="20%"><?php echo __('Código'); ?></td>
		<td class="td_texto" width="80%"><?php echo mascara($dependencia['Dependencia']['codigo_dependencia'],4); ?></td>
</tr>
<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo" width="20%"><?php echo __('Denominación'); ?></td>
		<td class="td_texto" width="80%"><?php echo $dependencia['Dependencia']['denominacion']; ?></td>
</tr>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php echo __('Gaceta Registro'); ?></td>
		<td class="td_texto"><?php echo $dependencia['Dependencia']['gaceta_registro']; ?></td>
</tr>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php echo __('Actividad'); ?></td>
		<td class="td_texto"><?php echo $dependencia['Dependencia']['actividad']; ?></td>
</tr>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php echo __('Tipo de Ente adscrito'); ?></td>
		<td class="td_texto"><?php echo $dependencia['Dependencia']['tipo_dependencia']==1?'Centralizada':'Descentralizada'; ?>&nbsp;</td>
</tr>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php echo __('Condición Actividad'); ?></td>
		<td class="td_texto"><?php echo $dependencia['Dependencia']['condicion_actividad']==true?"Activada":"Desactivada"; ?></td>
</tr>
	</table>
</div>
</fieldset>

	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/dependencias/index','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/dependencias/add','principal');"));?>

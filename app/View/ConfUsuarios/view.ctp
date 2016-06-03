<?php

if($this->Session->read('conf_nivel')==1){
	$titu = 'Usuario Principal del Ente adscrito';
}else{
	$titu = 'Usuario del Ente adscrito';
}

?><fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php  __($titu);?></legend>
<div class="usuarios view">
	<table cellpadding="0" cellspacing="0" id="view" <?php $i = 0; $class = ' class="altrow"';?>>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo" width="20%"><?php echo __('Ente adscrito'); ?></td>
		<td class="td_texto" width="80%"><?php echo $usuario['Dependencia']['denominacion']; ?></td>
</tr>
<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php echo __('Ente adscrito Origen'); ?></td>
		<td class="td_texto"><?php echo $usuario['Dependencia3']['denominacion']; ?></td>
</tr>
<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php echo __('Usuario'); ?></td>
		<td class="td_texto"><?php echo $usuario['Usuario']['usuario']; ?></td>
</tr>
<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php echo __('Nombre Completo'); ?></td>
		<td class="td_texto"><?php echo $usuario['Usuario']['nombre_completo']; ?></td>
</tr>
<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php echo __('DNI'); ?></td>
		<td class="td_texto"><?php echo $usuario['Usuario']['cedula_identidad']; ?></td>
</tr>
<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php echo __('Area'); ?></td>
		<td class="td_texto"><?php echo $usuario['Area']['denominacion']; ?></td>
</tr>
<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php echo __('Cargo'); ?></td>
		<td class="td_texto"><?php echo $usuario['Cargo']['denominacion']; ?></td>
</tr>
</div>
</fieldset>

	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa_ajax','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/conf_usuarios/index/','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/conf_usuarios/add','principal');"));?>

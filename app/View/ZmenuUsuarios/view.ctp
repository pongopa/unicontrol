<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php  __('RESTRICCIONES usuarios');?></legend>
<div class="zmenuUsuarios view">
	<table cellpadding="0" cellspacing="0" id="view" <?php $i = 0; $class = ' class="altrow"';?>>
<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php __('Usuario'); ?></td>
		<td class="td_texto"><?php echo $zmenuUsuario['Usuario']['usuario']; ?></td>
</tr>
<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php __('Modulo'); ?></td>
		<td class="td_texto"><?php echo $zmenuUsuario['Modulo']['denominacion']; ?></td>
</tr>
<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php __('Menu'); ?></td>
		<td class="td_texto"><?php echo $zmenuUsuario['Zmenu']['deno_menu']; ?></td>
</tr>
<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php __('Activo'); ?></td>
		<td class="td_texto"><?php echo $zmenuUsuario['ZmenuUsuario']['activo']==1?'Si':'No'; ?></td>
</tr>
</table>
</div>
</fieldset>

	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/zmenuUsuarios/index/page:$page','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/zmenuUsuarios/add','principal');"));?>

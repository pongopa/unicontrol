<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php  __('Zmenu');?></legend>
<div class="zmenus view">
	<table cellpadding="0" cellspacing="0" id="view" <?php $i = 0; $class = ' class="altrow"';?>>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php __('Id'); ?></td>

		<td class="td_texto"><?php echo $zmenu['Zmenu']['id']; ?></td>

</tr>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php __('Modulo Id'); ?></td>

		<td class="td_texto"><?php echo $zmenu['Zmenu']['modulo_id']; ?></td>

</tr>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php __('Deno Menu'); ?></td>

		<td class="td_texto"><?php echo $zmenu['Zmenu']['deno_menu']; ?></td>

</tr>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php __('Nivel'); ?></td>

		<td class="td_texto"><?php echo $zmenu['Zmenu']['nivel']; ?></td>

</tr>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php __('Id Menu'); ?></td>

		<td class="td_texto"><?php echo $zmenu['Zmenu']['id_menu']; ?></td>

</tr>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php __('Orden Ubicacion'); ?></td>

		<td class="td_texto"><?php echo $zmenu['Zmenu']['orden_ubicacion']; ?></td>

</tr>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php __('Url'); ?></td>

		<td class="td_texto"><?php echo $zmenu['Zmenu']['url']; ?></td>

</tr>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php __('Idcapa'); ?></td>

		<td class="td_texto"><?php echo $zmenu['Zmenu']['idcapa']; ?></td>

</tr>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php __('Tipo Inst'); ?></td>

		<td class="td_texto"><?php echo $zmenu['Zmenu']['tipo_inst']; ?></td>

</tr>

<tr <?php if ($i++ % 2 == 0) echo $class;?>>
		<td class="td_campo"><?php __('Activo'); ?></td>

		<td class="td_texto"><?php echo $zmenu['Zmenu']['activo']; ?></td>

</tr>
	</table>
</div>
</fieldset>

	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/zmenus/index/','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/zmenus/add','principal');"));?>

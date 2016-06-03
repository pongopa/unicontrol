<div class="zmenuUsuarios form">
<?php echo $this->Ajax->form('ZmenuUsuario','post',array('model'=>'ZmenuUsuario','url'=>'/zmenuUsuarios/add','update'=>'principal'));?>


	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php __('RESTRICCIONES usuarios'); ?></legend>

<table>
		<tr><td><?php echo $this->Form->input('id',array('label'=>false)); ?></td></tr>
		<tr><td>usuario</td></tr>
		<tr><td><?php echo $this->Form->input('usuario_id',array('label'=>false)); ?></td></tr>
		<tr><td>módulo</td></tr>
		<tr><td><?php echo $this->Form->input('modulo_id',array('label'=>false,'onchange'=>"input_remoto('/zmenuUsuarios/select_menu','select_menu',this.value);")); ?></td></tr>
		<tr><td>menu</td></tr>
		<tr><td id="select_menu"><?php echo $this->Form->input('zmenu_id',array('label'=>false)); ?></td></tr>
		<tr><td>activo</td></tr>
		<tr><td><?php echo $this->Form->input('activo',array('label'=>false)); ?></td></tr>
</table>

	</fieldset>
<?php echo $this->Form->end(array('lablel'=>'', 'class'=>'guardar_input2'));?>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/zmenuUsuarios/index/page:$page','principal');"));?>


</div>
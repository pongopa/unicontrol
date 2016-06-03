<div class="moduloUsuarios form">
<?php echo $this->Ajax->form('ModuloUsuario','post',array('model'=>'ModuloUsuario','url'=>'/moduloUsuarios/edit','update'=>'principal'));?>

<?php echo $this->Form->input('id',array('label'=>false)); ?>

<fieldset class="fieldset_marco">
	<legend class="titulo_marco"><?php __('RESTRICCIONES Módulos'); ?></legend>
	<table>
	    <tr><td>usuario</td></tr>
		<tr><td><?php echo $this->Form->input('usuario_id',array('label'=>false)); ?></td></tr>
		<tr><td>módulo</td></tr>
		<tr><td><?php echo $this->Form->input('modulo_id',array('label'=>false)); ?></td></tr>
	</table>
</fieldset>
<?php echo $this->Form->end(array('lablel'=>'', 'class'=>'guardar_input2'));?>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/moduloUsuarios/index/','principal');"));?>
</div>
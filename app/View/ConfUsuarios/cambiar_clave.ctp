<?
$titu = 'Usuario '.$USUARIO;
?>

<?php if(!isset($form_mostrar)):?>
<div class="usuarios form">
<?php  $this->Form->create('Usuario');?>
<?php echo $this->Ajax->form('Usuario','post',array('model'=>'Usuario','url'=>'/conf_usuarios/cambiar_clave/','update'=>'principal_add'));?>

	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php __($titu); ?></legend>
 		<div id="principal_add"></div>

  <table>
      <tr><td>Clave Actual:</td></tr>
      <tr><td><? echo $this->Form->input('clave_actual',array('label'=>false,'type'=>'password','value'=>'')); ?></td></tr>
      <tr><td>Clave Nueva:</td></tr>
      <tr><td><? echo $this->Form->input('clave_nueva',array('label'=>false,'type'=>'password','value'=>'')); ?></td></tr>
      <tr><td>Clave Nueva (Confirmar):</td></tr>
      <tr><td><? echo $this->Form->input('clave_nueva2',array('label'=>false,'type'=>'password','value'=>'')); ?></td></tr>

  </table>

	<?php


	?>
	</fieldset>
<?php echo $this->Form->end(array('class'=>'guardar_input2','id'=>'cambiar_id_bt'));?>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa_ajax','principal');"));?>
</div>
<?php endif;?>
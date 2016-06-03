<?
if($this->Session->read('conf_nivel')==1){
	$titu = 'Usuario Principal del Ente adscrito';
}else{
	$titu = 'Usuario del Ente adscrito';
}

?>


<div class="usuarios form">
<?php  $this->Form->create('Usuario');?>
<?php echo $this->Ajax->form('Usuario','post',array('model'=>'Usuario','url'=>'/conf_usuarios/edit','update'=>'principal_add'));?>

	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __($titu); ?></legend>
 		<div id="principal_add"></div>

  <table>
     <?
     if($this->Session->read('conf_nivel')==1){
     ?>
      <tr><td colspan="2">Ente adscrito:</td></tr>
      <tr><td colspan="2"><? echo $this->Form->input('dependencia_id',array('label'=>false,'onFocus'=>'blur();', 'style'=>'width:400px'));?></td></tr>
      <?}?>
      <tr><td>Usuario:</td><td>Clave:</td></tr>
       <tr>
       	<td><? echo $this->Form->input('usuario',array('label'=>false,'readonly'=>true)); ?></td>
        <td><? echo $this->Form->hidden('clave',array('label'=>false,'type'=>'password')); echo $this->Form->hidden('id'); ?></td>
       </tr>
      <tr><td>DNI:</td><td>Nombre Completo:</td></tr>
      <tr>
      <td><? echo $this->Form->input('cedula_identidad',array('label'=>false)); ?></td>
      <td><? echo $this->Form->input('nombre_completo',array('label'=>false)); ?></td></tr>
       <tr><td colspan="2">Correo Electronico:</td></tr>
       <tr><td colspan="2"><? echo $this->Form->input('email',array('label'=>false,'size'=>'45')); ?></td></tr>
       <tr>
       		<td>Area:</td>
       		<td>Cargo:</td>
       </tr>
       <tr>
	       	<td><? echo $this->Form->input('area_id',array('label'=>false,  'style'=>'width:150px')); ?></td>
	        <td><? echo $this->Form->input('cargo_id',array('label'=>false,  'style'=>'width:150px')); ?></td>
       </tr>
  </table>
	<?
	$nivel = $usuario['Usuario']['nivel'];
	?>
	<?php echo $this->Form->end(array('lablel'=>'', 'class'=>'guardar_input2'));?>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/conf_usuarios/index/$nivel/page:$page','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/conf_usuarios/add','principal');"));?>
	</fieldset>

</div>

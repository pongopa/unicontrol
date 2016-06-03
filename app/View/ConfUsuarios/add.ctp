<?
if($this->Session->read('conf_nivel')==1){
	$titu = 'Usuario Principal del Ente adscrito';
}else{
	$titu = 'Usuario del Ente adscrito';
}

?>


<div class="usuarios form">
<?php  $this->Form->create('Usuario');?>
<?php echo $this->Ajax->form('Usuario','post',array('model'=>'Usuario','url'=>'/conf_usuarios/add/'.$this->Session->read('conf_nivel'),'update'=>'principal_add'));?>

	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __($titu); ?></legend>
 		<div id="principal_add"></div>

  <table>
	     <?
	     if($this->Session->read('conf_nivel')==1){
	     ?>
            <tr><td colspan="2">Ente adscrito:</td></tr>
            <tr><td colspan="2"><? echo $this->Form->input('dependencia_id',array('label'=>false,'empty' => '--Seleccione--', 'style'=>'width:400px'));?></td></tr>
        <?}else{
            if($this->Session->read('NIVEL_DEPENDENCIA')==1){ ?>
            	<tr><td colspan="2">Ente de origen:</td></tr>
                <tr><td colspan="2"><? echo $this->Form->input('dependencia_orig_id',array('label'=>false,'empty' => '--Seleccione--', 'options'=>$dependencias, 'style'=>'width:400px'));?></td></tr>
     <?php }
        }?>

      <tr><td>Usuario:</td><td>Clave:</td></tr>
       <tr>
       	<td><? echo $this->Form->input('usuario',array('label'=>false)); ?></td>
        <td><? echo $this->Form->input('clave',array('label'=>false,'type'=>'password','value'=>'')); ?></td>
       </tr>
      <tr><td>DNI:</td><td>Nombres Completo:</td></tr>
      <tr>
      <td><? echo $this->Form->input('cedula_identidad',array('label'=>false)); ?></td>
      <td><? echo $this->Form->input('nombre_completo',array('label'=>false)); ?></td></tr>
       <tr><td colspan="2">Correo Electronico:</td></tr>
       <tr><td colspan="2"><? echo $this->Form->input('email',array('label'=>false,'size'=>'45')); ?></td>
      </tr>
       <tr>
       		<td>Area:</td>
       		<td>Cargo:</td>
       </tr>
       <tr>
	       	<td><? echo $this->Form->input('area_id',array('label'=>false,  'style'=>'width:150px')); ?></td>
	        <td><? echo $this->Form->input('cargo_id',array('label'=>false, 'style'=>'width:150px')); ?></td>
       </tr>
  </table>
		<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
		<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa_ajax','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/conf_usuarios/index','principal');"));?>
	</fieldset>

</div>

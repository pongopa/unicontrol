<div class="zmenus form">
<?php echo $this->Ajax->form('Zmenu','post',array('model'=>'Zmenu','url'=>'/zmenus/add','update'=>'principal'));?>


	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php __('Menu'); ?></legend>

<table>
		<tr><td>Módulo</td></tr>
		<tr><td><?php echo $this->Form->input('modulo_id',array('label'=>false,'empty'=>'--Seleccione--','url'=>'/zmenus/select_menu','update'=>'select_menu')); ?></td></tr>
		<tr><td>id menu</td></tr>
		<tr><td  id="select_menu"><?php echo $this->Form->input('id_menu',array('label'=>false,'options'=>array())); ?></td></tr>
		<tr><td>denominación menu</td></tr>
		<tr><td><?php echo $this->Form->input('deno_menu',array('label'=>false)); ?></td></tr>
		<tr><td>url</td></tr>
		<tr><td><?php echo $this->Form->input('url',array('label'=>false,'url'=>'/zmenus/update_idcapa','update'=>'idcapa')); ?></td></tr>
		<tr><td>idcapa</td></tr>
		<tr><td id="idcapa"><?php echo $this->Form->input('idcapa',array('label'=>false,'options'=>array('principal'=>'PRINCIPAL','no_ajax'=>'NO AJAX','NULL'=>'NULL'))); ?></td></tr>
        <tr><td>nivel</td></tr>
		<tr><td><?php echo $this->Form->input('nivel',array('label'=>false)); ?></td></tr>
		<tr><td>orden_ubicacion</td></tr>
		<tr><td><?php echo $this->Form->input('orden_ubicacion',array('label'=>false)); ?></td></tr>
		<!--<tr><td>tipo_inst</td></tr>
		<tr><td><?php echo $this->Form->hidden('tipo_inst',array('label'=>false,'value'=>0)); ?></td></tr>
		<tr><td>activo</td></tr>
		<tr><td><?php echo $this->Form->hidden('activo',array('label'=>false,'value'=>1)); ?></td></tr>-->
		<tr><td>Principal</td></tr>
		<tr><td><?php echo $this->Form->input('principal',array('label'=>false,'value'=>0,'type'=>'radio','options'=>array('1'=>'Si','0'=>'No'),'legend'=>false)); ?></td></tr>
		<tr><td>Principal Dependencia</td></tr>
		<tr><td><?php echo $this->Form->input('principal_dependencia',array('label'=>false, 'value'=>0,'type'=>'radio','options'=>array('1'=>'Si','0'=>'No'),'legend'=>false)); ?></td></tr>

</table>
<div id="mostrar_nivel_orden"></div>
	</fieldset>
<?php echo $this->Form->end(array('lablel'=>'', 'class'=>'guardar_input2'));?>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/zmenus/index/page:','principal');"));?>


</div>
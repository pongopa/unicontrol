<div class="requeequiherdetalles form">
		<?php echo $this->Ajax->form('Requeequiherdetalle','post',array('model'=>'Requeequiherdetalle','url'=>'/Requeequiherdetalles/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Requerimiento de herramientas Equipos y materiales'); ?></legend>
		<div id="principal_add"></div>
	<table>
		    <tr>
		        <td>Area</td>
		    	<td>numero requerimiento</td>
		    	<td>fecha requerimiento</td>
		    	<td>Hora requerimiento</td>
		    	<td>Fecha entrada</td>
		    </tr>
			<tr>
			    <td><?php echo $this->Form->input('area_id', array('label'=>false, 'style'=>'width:150px', 'value'=>$area));?></td>
			    <td><?php echo $this->Form->input('numero_requerimiento',array('label'=>false,'value'=>"REQ_UNI_".mascara($numeros,3)."/".mascara(date("y"),3), 'readonly'=>true));?></td>
			    <td><?php echo $this->Form->input('fecha_requerimiento', array('label'=>false, 'value'=>date("d/m/Y"), 'readonly'=>true));?></td>
			    <td><?php echo $this->Form->input('hora_requerimiento',array("onmouseover"=>"this.disabled=true;", "onmouseout"=>"this.disabled=false;", 'value'=>date("h:i:a"),'label'=>false,'empty'=>'- -', 'style'=>'width:50px'));?></td>
			    <td><?php echo $this->Form->input('fecha_entrada',array('label'=>false));?>
			    <?php echo $this->Form->input('contador',array('label'=>false, 'type'=>'hidden', 'value'=>$numeros));?>
			    </td>
			</tr>
	</table>
	 <table>
			<tr>
			    <td>solicitante</td>
    			<td>servicio realizado</td>
				<td>detalle del servicio</td>
			</tr>
			<tr>
				<td><?php echo $this->Form->input('solicitada_id', array('label'=>false, 'style'=>'width:250px', 'value'=>$usuario_id, 'options'=>$usuarios));?></td>
			    <td><?php echo $this->Form->input('serviciosrealizado_id', array('label'=>false,'empty'=>'- - SELECCIONE - -', 'style'=>'width:185px','onchange'=>"input_remoto('/Requeequiherdetalles/select_serv','actualizar_detalle',this.value);"));?></td>
				<td id="detalle"><?php echo $this->Form->input('detalle_servicio', array('label'=>false, 'type'=>'textarea', 'cols'=>'46', 'rows'=>'2', 'readonly'=>true));?></td>
			</tr>
	</table>
	<div id="actualizar_detalle"></div>
	<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Requeequiherdetalles/index','principal');"));?>
	<?php $this->Productos->create_req(); ?>
	</fieldset>
</div>

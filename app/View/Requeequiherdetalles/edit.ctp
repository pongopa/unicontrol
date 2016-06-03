<div class="requeequiherdetalles form">
	<?php echo $this->Ajax->form('Requeequiherdetalle','post',array('model'=>'Requeequiherdetalle','url'=>'/Requeequiherdetalles/edit','update'=>'principal_add'));?>
	<?php echo $this->Form->input('id',array('label'=>false)); ?>
	<?php
	if(!empty($this->request->data["Requeequiherdetalle"]["fecha_requerimiento"])){
		$this->request->data["Requeequiherdetalle"]["fecha_requerimiento"] = cambiar_formato_fecha($this->request->data["Requeequiherdetalle"]["fecha_requerimiento"]);
	}
	if(!empty($this->request->data["Requeequiherdetalle"]["fecha_entrada"])){
		$this->request->data["Requeequiherdetalle"]["fecha_entrada"] = cambiar_formato_fecha($this->request->data["Requeequiherdetalle"]["fecha_entrada"]);
	}
	if(!empty($this->request->data["Requeequiherdetalle"]["fecha_aprobado"])){
		$this->request->data["Requeequiherdetalle"]["fecha_aprobado"] = cambiar_formato_fecha($this->request->data["Requeequiherdetalle"]["fecha_aprobado"]);
	}
	?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Editar Requerimiento de herramientas Equipos y materiales'); ?></legend>
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
				    <td><?php echo $this->Form->input('area_id', array('readonly'=>true,'label'=>false, 'style'=>'width:150px', 'value'=>$area));?></td>
				    <td><?php echo $this->Form->input('numero_requerimiento',array('readonly'=>true,'label'=>false));?></td>
				    <td><?php echo $this->Form->input('fecha_requerimiento',array('label'=>false, 'readonly'=>true));?></td>
				    <td><?php echo $this->Form->input('hora_requerimiento',array("onmouseover"=>"this.disabled=true;", "onmouseout"=>"this.disabled=false;",'label'=>false,'empty'=>'- -', 'style'=>'width:50px'));?></td>
				    <td><?php echo $this->Form->input('fecha_entrada',array('label'=>false));?></td>
				</tr>
		</table>
		 <table>
				<tr>
				    <td>solicitante</td>
	    			<td>servicio realizado</td>
					<td>detalle del servicio</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('solicitada_id', array('readonly'=>true,'label'=>false, 'style'=>'width:250px', 'value'=>$usuario_id, 'options'=>$usuarios));?></td>
				    <td><?php echo $this->Form->input('serviciosrealizado_id', array('readonly'=>true,'label'=>false,'empty'=>'- - SELECCIONE - -', 'style'=>'width:185px','onchange'=>"input_remoto('/Requeequiherdetalles/select_serv','actualizar_detalle',this.value);"));?></td>
					<td id="detalle"><?php echo $this->Form->input('detalle_servicio', array('label'=>false, 'type'=>'textarea', 'cols'=>'46', 'rows'=>'2', 'readonly'=>true));?></td>
				</tr>
		</table>
		<?php
                if($cargo==3){
		?>
				<table>
						<tr>
						    <td>Aprovado por</td>
			    			<td></td>
							<td>fecha Aprovado</td>
					    	<td>Hora Aprovado</td>
					    	<td>Estatus</td>
						</tr>
						<tr>
							<td><?php echo $this->Form->input('gerente_id', array("onmouseover"=>"this.disabled=true;", "onmouseout"=>"this.disabled=false;", 'readonly'=>true,'label'=>false,'style'=>'width:250px', 'value'=>$gerente_id, 'options'=>$gerentes));?></td>
						    <td><?php echo $this->Form->input('aprobado',array('label'=>false,'type'=>'radio','value'=>'1','options'=>array('1'=>'Si','2'=>'No'))); ?></td>
							<td><?php echo $this->Form->input('fecha_aprobado',array('label'=>false, 'value'=>date("d/m/Y"), 'readonly'=>true));?></td>
						    <td><?php echo $this->Form->input('hora_aprobado',array('value'=>date("h:i:a"), 'readonly'=>true,'label'=>false,'empty'=>'- -', 'style'=>'width:50px'));?></td>
						    <td><?php echo $this->Form->input('status_id',array('label'=>false,'empty'=>'- -', 'style'=>'width:100px'));?></td>
						</tr>
				</table>
		<?php
          }else if($cargo==6){
        ?>
		        <table>
						<tr>
					    	<td>Estatus</td>
						</tr>
						<tr>
						     <td><?php echo $this->Form->input('status_id',array('label'=>false,'empty'=>'- -', 'style'=>'width:100px'));?></td>
						</tr>
				</table>
        <?php
          }
		?>
	<table cellpadding="0" cellspacing="0" class="grilla">
		<tr>
				<th><?php echo __('Código');?></th>
				<th><?php echo __('Unidad de medida');?></th>
				<th><?php echo __('Denominación');?></th>
				<th><?php echo __('Cantidad');?></th>
		</tr>
		<?php
		$i = 0;
		$total = 0;
		foreach ($requeequiherdetalle as $requeequiherproducto): ?>
		<tr>
			<td><?php echo h($requeequiherproducto['Requeequiherproducto']['producto_id']); ?>&nbsp;</td>
			<td><?php echo h($requeequiherproducto['Producto']['Productosmedida']["denominacion"]); ?>&nbsp;</td>
			<td><?php echo h($requeequiherproducto['Producto']['denominacion']); ?>&nbsp;</td>
			<td><?php echo Formato($requeequiherproducto['Requeequiherproducto']['cantidad'],2); ?>&nbsp;</td>
		</tr>
		<?php endforeach; ?>
	</table>
	</fieldset>
<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Requeequiherdetalles/index','principal');"));?>
</div>
<script>
$("RequeequiherdetalleDetalleServicio").value      ='<?=$serviciosrealizados2[0]["Serviciosrealizado"]["detalle"]?>';
</script>

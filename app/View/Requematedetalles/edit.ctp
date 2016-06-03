<div class="requematedetalles form">
	<?php echo $this->Ajax->form('Requematedetalle','post',array('model'=>'Requematedetalle','url'=>'/Requematedetalles/edit','update'=>'principal_add'));?>
	<?php echo $this->Form->input('id',array('label'=>false)); ?>
	<?php
	if(!empty($this->request->data["Requematedetalle"]["fecha_requerimiento"])){
		$this->request->data["Requematedetalle"]["fecha_requerimiento"] = cambiar_formato_fecha($this->request->data["Requematedetalle"]["fecha_requerimiento"]);
	}
	if(!empty($this->request->data["Requematedetalle"]["fecha_salida"])){
		$this->request->data["Requematedetalle"]["fecha_salida"] = cambiar_formato_fecha($this->request->data["Requematedetalle"]["fecha_salida"]);
	}
	if(!empty($this->request->data["Requematedetalle"]["fecha_solicitada_por"])){
		$this->request->data["Requematedetalle"]["fecha_solicitada_por"] = cambiar_formato_fecha($this->request->data["Requematedetalle"]["fecha_solicitada_por"]);
	}
	if(!empty($this->request->data["Requematedetalle"]["fecha_revisado_por_1"])){
		$this->request->data["Requematedetalle"]["fecha_revisado_por_1"] = cambiar_formato_fecha($this->request->data["Requematedetalle"]["fecha_revisado_por_1"]);
	}
	if(!empty($this->request->data["Requematedetalle"]["fecha_revisado_por_2"])){
		$this->request->data["Requematedetalle"]["fecha_revisado_por_2"] = cambiar_formato_fecha($this->request->data["Requematedetalle"]["fecha_revisado_por_2"]);
	}
	?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Editar Requerimiento de Materiales'); ?></legend>
		<div id="principal_add"></div>
	<table>
		    <tr>
		    	<td>numero requerimiento</td>
		    	<td>fecha requerimiento</td>
		    	<td>fecha salida</td>
		    	<td>numero obra</td>
		    </tr>
			<tr>
			    <td><?php echo $this->Form->input('numero_requerimiento',array('label'=>false));?></td>
			    <td><?php echo $this->Form->input('fecha_requerimiento',array('label'=>false));?></td>
			    <td><?php echo $this->Form->input('fecha_salida',array('label'=>false));?></td>
			    <td><?php echo $this->Form->input('numero_obra',array('label'=>false));?></td>
			</tr>
	</table>
	 <table>
			<tr>
				<td>area 1</td>
				<td>area 2</td>
				<td>departamento</td>
				<td>centro costo</td>
			</tr>
			<tr>
				<td><?php echo $this->Form->input('area_1',array('label'=>false));?></td>
			    <td><?php echo $this->Form->input('area_2',array('label'=>false));?></td>
			    <td><?php echo $this->Form->input('departamento',array('label'=>false));?></td>
			    <td><?php echo $this->Form->input('centro_costo',array('label'=>false));?></td>
			</tr>
	</table>
	 <table>
			<tr>
			    <td>solicitada por</td>
				<td>fecha solicitada por</td>
				<td>hora solicitada por</td>
			</tr>
			<tr>
				<td><?php echo $this->Form->input('solicitada_por',array('label'=>false));?></td>
			    <td><?php echo $this->Form->input('fecha_solicitada_por',array('label'=>false));?></td>
			    <td><?php echo $this->Form->input('hora_solicitada_por',array('label'=>false,'empty'=>'- -', 'style'=>'width:50px'));?></td>
			</tr>
	</table>
	 <table >
			<tr>
			    <td>revisado por 1</td>
			    <td>fecha revisado por 1</td>
			    <td>hora revisado por 1</td>
			</tr>
			<tr>
				<td><?php echo $this->Form->input('revisado_por_1',array('label'=>false));?></td>
			    <td><?php echo $this->Form->input('fecha_revisado_por_1',array('label'=>false));?></td>
			    <td><?php echo $this->Form->input('hora_revisado_por_1',array('label'=>false,'empty'=>'- -', 'style'=>'width:50px'));?></td>
			</tr>
	</table>
	 <table>
			<tr>
			    <td>revisado por 2</td>
			    <td>fecha revisado por 2</td>
			    <td>hora revisado por 2</td>
			</tr>
			<tr>
				<td><?php echo $this->Form->input('revisado_por_2',array('label'=>false));?></td>
			    <td><?php echo $this->Form->input('fecha_revisado_por_2',array('label'=>false));?></td>
			    <td><?php echo $this->Form->input('hora_revisado_por_2',array('label'=>false,'empty'=>'- -', 'style'=>'width:50px'));?></td>
			</tr>
     </table>
	 <table>
			<tr>
				<td>servicio</td>
				<td>actividad</td>
				<td>lugar entrega</td>
			</tr>
			<tr><td><?php echo $this->Form->input('servicio',array('label'=>false));?></td>
				<td><?php echo $this->Form->input('actividad',array('label'=>false));?></td>
				<td><?php echo $this->Form->input('lugar_entrega',array('label'=>false));?></td>
			</tr>

	 </table>
	 <table>
		<tr><td>nota</td></tr>
		<tr><td><?php echo $this->Form->input('nota',array('label'=>false));?></td></tr>
	</table>
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
		foreach ($requematedetalle as $requemateproducto): ?>
		<tr>
			<td><?php echo h($requemateproducto['Requemateproducto']['producto_id']); ?>&nbsp;</td>
			<td><?php echo h($requemateproducto['Producto']['Productosmedida']["denominacion"]); ?>&nbsp;</td>
			<td><?php echo h($requemateproducto['Producto']['denominacion']); ?>&nbsp;</td>
			<td><?php echo Formato($requemateproducto['Requemateproducto']['cantidad'],2); ?>&nbsp;</td>
		</tr>
		<?php endforeach; ?>
	</table>
	</fieldset>
<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Requematedetalles/index','principal');"));?>
</div>

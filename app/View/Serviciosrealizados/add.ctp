<div class="serviciosrealizados form">
<?php echo $this->Ajax->form('Serviciosrealizado','post',array('model'=>'Serviciosrealizado','url'=>'/Serviciosrealizados/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Servicios realizado'); ?></legend>
 		<div id="principal_add"></div>
		<table>
 			<tr>
				<td>numero de servicio</td>
				<td>cliente</td>
			</tr>
				<td><?php echo $this->Form->input('numero_de_servicio', array('label'=>false));?></td>
				<td><?php echo $this->Form->input('cliente_id', array('label'=>false,'empty'=>'- -', 'style'=>'width:200px','onchange'=>"input_remoto('/Serviciosrealizados/cliente','cliente',this.value);"));?></td>
			</tr>
		</table>
		<div id="cliente">
			<table>
	 			<tr>
	 				<td>Contacto del cliente</td>
					<td>Ubicacion del servicio</td>
				</tr>
					<td><?php echo $this->Form->input('clientesvendedore_id', array('label'=>false,'empty'=>'- -', 'style'=>'width:250px'));?></td>
					<td><?php echo $this->Form->input('clientesucursa_id', array('label'=>false,'empty'=>'- -', 'style'=>'width:250px'));?></td>
				</tr>
			</table>
		</div>
		<table>
			<tr>
				<td>detalle</td>
				<td>personal requerido</td>
			</tr>
			<tr>
				<td><?php echo $this->Form->input('detalle', array('label'=>false));?></td>
				<td><?php echo $this->Form->input('personal_requerido', array('label'=>false));?></td>
			</tr>
		</table>
		<table>
			<tr>
					<td>responsable</td>
					<td>fecha inicio</td>
					<td>fecha fin</td>
					<td>status</td>
			</tr>
			<tr>
					<td><?php echo $this->Form->input('usuario_id', array('label'=>false,'empty'=>'- -', 'style'=>'width:200px'));?></td>
					<td><?php echo $this->Form->input('fecha_inicio', array('label'=>false));?></td>
					<td><?php echo $this->Form->input('fecha_fin', array('label'=>false));?></td>
					<td><?php echo $this->Form->input('statuse_id', array('label'=>false,'empty'=>'- -', 'style'=>'width:100px'));?></td>
			</tr>
		</table>
		<table>
			<tr>
					<td>Cotización</td>
					<td>Orden Compra</td>
					<td><br></td>
					<td>Número Factura</td>
			</tr>
			<tr>
					<td><?php echo $this->Form->input('cotizacion', array('label'=>false));?></td>
					<td><?php echo $this->Form->input('orden_compra', array('label'=>false));?></td>
					<td><?php echo $this->Form->input('facturado',array('label'=>false,'type'=>'radio','value'=>'2','options'=>array('1'=>'Si','2'=>'No'))); ?></td>
			        <td><?php echo $this->Form->input('numero_factura', array('label'=>false));?></td>
			</tr>
		</table>
		<table>
			<tr>
					<td><?php echo $this->Form->input('tareo',array('label'=>false,'type'=>'radio','value'=>'2','options'=>array('1'=>'Si','2'=>'No'))); ?></td>
					<td><?php echo $this->Form->input('informe',array('label'=>false,'type'=>'radio','value'=>'1','options'=>array('1'=>'Si','2'=>'No'))); ?></td>
					<td><?php echo $this->Form->input('conformidad',array('label'=>false,'type'=>'radio','value'=>'2','options'=>array('1'=>'Si','2'=>'No'))); ?></td>
			</tr>
		</table>
		<table>
			<tr>
					<td>observaciones</td>
			</tr>
			<tr>
					<td><?php echo $this->Form->input('observaciones', array('label'=>false));?></td>
			</tr>
		</table>
	</fieldset>
<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Serviciosrealizados/index','principal');"));?>
</div>


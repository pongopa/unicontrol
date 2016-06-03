<?php $area = $this->Session->read("USUARIO_AREA");?>
<div class="ordencompras form">
	<?php echo $this->Ajax->form('Ordencompra','post',array('model'=>'Ordencompra','url'=>'/Ordencompras/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Orden compra'); ?></legend>
 		<div id="principal_add"></div>
	 	<table >
	 			<tr>
	 			    <td>tipo de orden</td>
					<td>año orden compra</td>
					<td>numero orden compra</td>
					<td>fecha orden compra</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('ordencomprastipo_id', array('label'=>false,'empty'=>'- - SELECCIONE - -', 'style'=>'width:100px','onchange'=>"input_remoto('/Ordencompras/select_tipo_orden','actualizar_tipo_orden',this.value);"));?></td>
					<td><?php echo $this->Form->input('ano_orden_compra', array('label'=>false));?></td>
					<td><?php echo $this->Form->input('numero_orden_compra', array('label'=>false));?></td>
					<td><?php echo $this->Form->input('fecha_orden_compra', array('label'=>false));?></td>

				</tr>
		</table>
		<div id="actualizar_tipo_orden"></div>
		<table>
				<tr>
				 	<td>area</td>
				 	<td>servicio realizado</td>
				 	<td>detalle del servicio</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('area_id', array('label'=>false,'empty'=>'- - SELECCIONE - -', 'style'=>'width:200px', 'value'=>$area));?></td>
				    <td><?php echo $this->Form->input('serviciosrealizado_id', array('label'=>false,'empty'=>'- - SELECCIONE - -', 'style'=>'width:185px','onchange'=>"input_remoto('/Ordencompras/select_serv/','actualizar_detalle',this.value);"));?></td>
				    <td id="detalle"><?php echo $this->Form->input('detalle_servicio', array('label'=>false, 'type'=>'textarea', 'cols'=>'46', 'rows'=>'2', 'readonly'=>true));?></td>
				</tr>
		</table>
		<div id="actualizar_detalle"></div>
		<table>
		        <tr>
		        	<td>proveedor</td>
		        	<td>Número de RUC</td>
		        	<td>Dirección + Departamento + Provincia + Distrito</td>
		        </tr>
				<tr>
					<td><?php $this->OrdenCompra->create_buscar_proveedor(); ?></td>
					<td><?php echo $this->Form->input('Ordencompra.ruc',       array('label'=>false, 'size'=>'20', 'readonly'=>true));?></td>
					<td><?php echo $this->Form->input('Ordencompra.direccion', array('label'=>false, 'size'=>'40', 'type'=>'textarea', 'cols'=>'46', 'rows'=>'2', 'readonly'=>true));?></td>
				</tr>
		</table>
		<div id="proveedor_c">
		    <table>
				<tr>
					<td>Contacto</td>
					<td>Celulares</td>
					<td>Correos Electronicos</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('Ordencompra.proveedoresvendedore_id', array('label'=>false, 'style'=>'width:200px'));?></td>
					<td><?php echo $this->Form->input('Ordencompra.celular',  array('label'=>false, 'cols'=>'23', 'rows'=>'2', 'readonly'=>true));?></td>
					<td><?php echo $this->Form->input('Ordencompra.email',    array('label'=>false, 'cols'=>'46', 'rows'=>'2', 'readonly'=>true));?></td>
				</tr>
			</table>
			<table>
			 	<tr><td>banco</td></tr>
				<tr><td><?php echo $this->Form->input('Ordencompra.proveedoresbanco_id', array('label'=>false, 'style'=>'width:500px'));?></td></tr>
		    </table>
		</div>
		<table >
				<tr>
				  	<td>forma entrega</td>
				  	<td>forma pago</td>
				  	<td>condicion pago</td>
				  	<td>cotizacion referencia</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('formaentrega_id', array('label'=>false, 'style'=>'width:150px','empty'=>'- - SELECCIONE - -'));?></td>
					<td><?php echo $this->Form->input('formapago_id', array('label'=>false, 'style'=>'width:150px','empty'=>'- - SELECCIONE - -'));?></td>
					<td><?php echo $this->Form->input('condicionpago_id', array('label'=>false, 'style'=>'width:150px','empty'=>'- - SELECCIONE - -'));?></td>
					<td><?php echo $this->Form->input('cotizacion_referencia', array('label'=>false));?></td>
				</tr>
        </table>
        <table>
				<tr>
					<td>% I.G.V a aplicar</td>
					<td>Administrador</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('porcentaje_igv',   array('label'=>false, 'onkeypress'=>'return numeros_con_punto(event);', 'value'=>'18'));?></td>
					<td><?php echo $this->Form->input('administrador_id', array('label'=>false, 'style'=>'width:150px','empty'=>'- - SELECCIONE - -', 'options'=>$administradores));?></td>
				</tr>
		</table>
        <table>
				<tr><td>observacion</td></tr>
				<tr><td><?php echo $this->Form->input('observacion', array('label'=>false, 'cols'=>'50', 'rows'=>'4'));?></td></tr>
		</table>
		<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
		<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Ordencompras/index','principal');"));?>
		<?php $this->Productos->create(); ?>
		<table>
		        <tr>
		        	<td>sub total</td>
		        	<td>Total % I.G.V</td>
		        	<td>Total</td>
		        </tr>
				<tr>
					<td><?php echo $this->Form->input('sub_total1',     array('label'=>false, 'readonly'=>true));?></td>
					<td><?php echo $this->Form->input('igv1',           array('label'=>false, 'readonly'=>true));?></td>
					<td><?php echo $this->Form->input('total1',         array('label'=>false, 'readonly'=>true));?></td>
				</tr>
		</table>
	</fieldset>
</div>

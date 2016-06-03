<div class="clientes form">
	<?php echo $this->Ajax->form('Cliente','post',array('model'=>'Cliente','url'=>'/Clientes/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Cliente'); ?></legend>
		<div id="principal_add"></div>
		<table>
	 			<tr>
		 			<td>ruc</td>
		 			<td>razon social</td>
		 			<td>nombre comercial</td>
	 			</tr>
				<tr>
					<td><?php echo $this->Form->input('ruc',array('label'=>false));?></td>
				    <td><?php echo $this->Form->input('razon_social',array('label'=>false));?></td>
				    <td><?php echo $this->Form->input('nombre_comercial',array('label'=>false));?></td>
				</tr>
        </table>
        <table>
	 			<tr>
		 			<td>estado del contribuyente</td>
		 			<td>condicion del pago</td>
		 			<td>Dias de pago</td>
	 			</tr>
				<tr>
					<td><?php echo $this->Form->input('estadocontribuyente_id',array('label'=>false, 'style'=>'width:150px'));?></td>
				    <td><?php echo $this->Form->input('condicionpago_id',array('label'=>false, 'style'=>'width:150px'));?></td>
				    <td><?php echo $this->Form->input('dias_pago',array('label'=>false));?></td>
				</tr>
        </table>
        <table>
				<tr>
					<td>fecha de inscripción</td>
					<td>pagina web</td>
				</tr>
				<tr>
					<td><?php echo $this->Form->input('fecha_de_inscripcion',array('label'=>false));?></td>
					<td><?php echo $this->Form->input('pagina_web',array('label'=>false,'size'=>'50'));?></td>
				</tr>
		</table>
		<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
		<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Clientes/index','principal');"));?>
		<br>
        <table  border="1">
			<tr>
						<td><h2>Ubicación de la Empresa y Sucursales</h2></td>
			</tr>
			<tr>
				<td>
						<?php $this->Cliente->create_direccion(); ?>
			    </td>
			</tr>
		</table>
		<br>
        <table  border="1">
			<tr>
						<td><h2>Contacto Interno de la Empresa</h2></td>
			</tr>
			<tr>
				<td>
						<?php $this->Cliente->create_contato(); ?>
			    </td>
			</tr>
		</table>
	</fieldset>
</div>

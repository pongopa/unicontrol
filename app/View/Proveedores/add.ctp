<div class="proveedores form">
<?php echo $this->Ajax->form('Proveedore','post',array('model'=>'Proveedore','url'=>'/Proveedores/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Proveedor'); ?></legend>
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
	 			<tr>
		 			<td>estado del contribuyente</td>
		 			<td>condicion pago</td>
		 			<td>dias pago</td>
	 			</tr>
				<tr>
					<td><?php echo $this->Form->input('estadocontribuyente_id',array('label'=>false,'empty'=>'- -', 'style'=>'width:200px'));?></td>
					<td><?php echo $this->Form->input('condicionpago_id',array('label'=>false,'empty'=>'- -', 'style'=>'width:200px'));?></td>
					<td><?php echo $this->Form->input('dias_pago',array('label'=>false));?></td>
				</tr>
        </table>
	        <table>
					<tr>
						<td>fecha de inscripcion</td>
						<td>pagina web</td>
					</tr>
					<tr>
					   <td><?php echo $this->Form->input('fecha_de_inscripcion',array('label'=>false));?></td>
					   <td><?php echo $this->Form->input('pagina_web',array('label'=>false,'size'=>'50')); ?></td>
					</tr>
			</table>
		     <table  border="1">
					<tr>
								<td><h2>Ubicacion de la Empresa</h2></td>
					</tr>
					<tr>
						<td>
						        <table>
										<tr>
											<td>direccion</td>
											<td>referencia</td>
										</tr>
										<tr>
											<td><?php echo $this->Form->input('direccion',array('label'=>false));?></td>
											<td><?php echo $this->Form->input('referencia',array('label'=>false));?></td>
										</tr>
								</table>
								<table width="80%">
									<tr>
										<td>pais</td>
										<td>departamento</td>
										<td>provincia</td>
										<td>Distrito</td>
									</tr>
									<tr>
										<td><?php echo $this->Form->input('conf_pai_id',array('label'=>false,'empty'=>'- - SELECCIONE - -','onchange'=>"input_remoto('/Proveedores/select/1','select_departamento',this.value);", 'style'=>'width:150px')); ?></td>
									    <td id="select_departamento"><?php echo $this->Form->input('Proveedore.conf_departamento_id',array('label'=>false, 'style'=>'width:150px')); ?></td>
									    <td id="select_provincia"><?php echo $this->Form->input('Proveedore.conf_provincia_id',array('label'=>false, 'style'=>'width:150px')); ?></td>
									    <td id="select_distrito"><?php echo $this->Form->input('Proveedore.conf_distrito_id',array('label'=>false, 'style'=>'width:150px')); ?></td>
							    </table>
						 </td>
					</tr>
			  </table>
		<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
		<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Proveedores/index','principal');"));?>
       <br>
       <table  border="1">
					<tr>
								<td><h2>Contacto de la Empresa</h2></td>
					</tr>
					<tr>
						<td>
								<?php $this->Proveedor->create_contato(); ?>
					    </td>
					</tr>
		</table>
		<br>
       <table  border="1">
					<tr>
								<td><h2>Banco de la Empresa</h2></td>
					</tr>
					<tr>
						<td>
								<?php $this->Proveedor->create_banco(); ?>
						</td>
					</tr>
		</table>
		<br>
		<table  border="1">
					<tr>
								<td><h2>Rubro de la Empresa</h2></td>
					</tr>
					<tr>
						<td>
								<?php $this->Proveedor->create_rubro(); ?>
						</td>
					</tr>
		</table>
	</fieldset>
</div>

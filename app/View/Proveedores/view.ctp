<div class="proveedores view">
<fieldset class="fieldset_marco">
				<legend class="titulo_marco"><?php  echo __('Proveedor');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($proveedore['Proveedore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ruc'); ?></dt>
		<dd>
			<?php echo h($proveedore['Proveedore']['ruc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Razon Social'); ?></dt>
		<dd>
			<?php echo h($proveedore['Proveedore']['razon_social']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Comercial'); ?></dt>
		<dd>
			<?php echo h($proveedore['Proveedore']['nombre_comercial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($proveedore['Proveedore']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('referencia'); ?></dt>
		<dd>
			<?php echo h($proveedore['Proveedore']['referencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pais'); ?></dt>
		<dd>
			<?php echo h($proveedore['ConfPai']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Departamento'); ?></dt>
		<dd>
			<?php echo h($proveedore['ConfDepartamento']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provincia'); ?></dt>
		<dd>
			<?php echo h($proveedore['ConfProvincia']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distrito'); ?></dt>
		<dd>
			<?php echo h($proveedore['ConfDistrito']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pagina Web'); ?></dt>
		<dd>
			<?php echo h($proveedore['Proveedore']['pagina_web']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha De Inscripcion'); ?></dt>
		<dd>
			<?php echo h(cambiar_formato_fecha($proveedore['Proveedore']['fecha_de_inscripcion'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Condicionpago'); ?></dt>
		<dd>
			<?php echo h($proveedore['Condicionpago']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado Del Contribuyente'); ?></dt>
		<dd>
			<?php echo h($proveedore['Estadocontribuyente']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dias Pago'); ?></dt>
		<dd>
			<?php echo h($proveedore['Proveedore']['dias_pago']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Usuario Creador'); ?></dt>
		<dd>
			<?php echo h($proveedore['AddUsuario']['usuario']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Usuario Modificador'); ?></dt>
		<dd>
			<?php echo h($proveedore['ModUsuario']['usuario']); ?>
			&nbsp;
		</dd>




	</dl>
	<table  border="1">
		<tr>
					<td><h2>Contacto de la Empresa</h2></td>
		</tr>
		<tr>
			<td>
					<table cellpadding="0" cellspacing="0" class="grilla">
					<tr>
							<th><?php echo __('Nombres y Apellidos');?></th>
							<th><?php echo __('Cargo');?></th>
							<th><?php echo __('Cell 01');?></th>
							<th><?php echo __('Cell 02');?></th>
							<th><?php echo __('Email 01');?></th>
							<th><?php echo __('Email 02');?></th>
					</tr>
					<?php
					$i = 0;
					$total = 0;
					foreach ($proveedore["Proveedoresvendedore"] as $proveedoresvendedore): ?>
					<tr>
						<td><?php echo h($proveedoresvendedore['nombres_y_apellidos']); ?>&nbsp;</td>
						<td><?php echo h($proveedoresvendedore['cargo']); ?>&nbsp;</td>
						<td><?php echo h($proveedoresvendedore['cell_1']); ?>&nbsp;</td>
						<td><?php echo h($proveedoresvendedore['cell_2']); ?>&nbsp;</td>
						<td><?php echo h($proveedoresvendedore['email_1']); ?>&nbsp;</td>
						<td><?php echo h($proveedoresvendedore['email_2']); ?>&nbsp;</td>
					</tr>
					<?php endforeach; ?>
					</table>
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
					<table cellpadding="0" cellspacing="0" class="grilla">
					<tr>
							<th><?php echo __('Banco');?></th>
							<th><?php echo __('Moneda');?></th>
							<th><?php echo __('Cuenta');?></th>
					</tr>
					<?php
					$i = 0;
					$total = 0;
					foreach ($proveedore["Proveedoresbanco"] as $proveedoresbanco): ?>
					<tr>
						<td><?php echo h($proveedoresbanco["Banco"]["denominacion"]); ?>&nbsp;</td>
						<td><?php echo h($proveedoresbanco["Moneda"]["denominacion"]); ?>&nbsp;</td>
						<td><?php echo h($proveedoresbanco['cuenta_bancaria']); ?>&nbsp;</td>
					</tr>
					<?php endforeach; ?>
					</table>
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
					<table cellpadding="0" cellspacing="0" class="grilla">
					<tr>
							<th><?php echo __('Rubro');?></th>
					</tr>
					<?php
					$i = 0;
					$total = 0;
					foreach ($proveedore["Proveedoresrubro"] as $proveedoresrubro): ?>
					<tr>
						<td><?php echo h($proveedoresrubro["Rubro"]["denominacion"]); ?>&nbsp;</td>
					</tr>
					<?php endforeach; ?>
					</table>
			</td>
		</tr>
	</table>







	</fieldset>
</div>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Proveedores/index','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Proveedores/add','principal');"));?>

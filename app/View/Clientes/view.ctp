<div class="clientes view">
<fieldset class="fieldset_marco">
				<legend class="titulo_marco"><?php  echo __('Cliente');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ruc'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['ruc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Razon Social'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['razon_social']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Comercial'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['nombre_comercial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha De Inscripcion'); ?></dt>
		<dd>
			<?php echo h(cambiar_formato_fecha($cliente['Cliente']['fecha_de_inscripcion'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Condicionpago'); ?></dt>
		<dd>
			<?php echo h($cliente['Condicionpago']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado Del Contribuyente'); ?></dt>
		<dd>
			<?php echo h($cliente['Estadocontribuyente']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dias Pago'); ?></dt>
		<dd>
			<?php echo h($cliente['Cliente']['dias_pago']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Usuario Creador'); ?></dt>
		<dd>
			<?php echo h($cliente['AddUsuario']['usuario']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Usuario Modificador'); ?></dt>
		<dd>
			<?php echo h($cliente['ModUsuario']['usuario']); ?>
			&nbsp;
		</dd>
	</dl>
	<table  border="1">
		<tr>
					<td><h2>Ubicación de la Empresa y Sucursales</h2></td>
		</tr>
		<tr>
			<td>
					<table cellpadding="0" cellspacing="0" class="grilla">
					<tr>
							<th><?php echo __('Dirección');?></th>
							<th><?php echo __('Referencia');?></th>
							<th><?php echo __('Pais');?></th>
							<th><?php echo __('Departamento');?></th>
							<th><?php echo __('Provincia');?></th>
							<th><?php echo __('Distrito');?></th>
					</tr>
					<?php
					$i = 0;
					$total = 0;
					foreach ($cliente["Clientesucursa"] as $clientesucursa): ?>
					<tr>
						<td><?php echo h($clientesucursa['direccion']); ?>&nbsp;</td>
						<td><?php echo h($clientesucursa['referencia']); ?>&nbsp;</td>
						<td><?php echo h($clientesucursa['ConfPai']["denominacion"]); ?>&nbsp;</td>
						<td><?php echo h($clientesucursa['ConfDepartamento']["denominacion"]); ?>&nbsp;</td>
						<td><?php echo h($clientesucursa['ConfProvincia']["denominacion"]); ?>&nbsp;</td>
						<td><?php echo h($clientesucursa['ConfDistrito']["denominacion"]); ?>&nbsp;</td>
					</tr>
					<?php endforeach; ?>
					</table>
			</td>
		</tr>
	</table>
	<br>
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
					foreach ($cliente["Clientesvendedore"] as $clientesvendedore): ?>
					<tr>
						<td><?php echo h($clientesvendedore['nombres_y_apellidos']); ?>&nbsp;</td>
						<td><?php echo h($clientesvendedore['cargo']); ?>&nbsp;</td>
						<td><?php echo h($clientesvendedore['cell_1']); ?>&nbsp;</td>
						<td><?php echo h($clientesvendedore['cell_2']); ?>&nbsp;</td>
						<td><?php echo h($clientesvendedore['email_1']); ?>&nbsp;</td>
						<td><?php echo h($clientesvendedore['email_2']); ?>&nbsp;</td>
					</tr>
					<?php endforeach; ?>
					</table>
			</td>
		</tr>
	</table>
	<br>
	</fieldset>
</div>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Clientes/index','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Clientes/add','principal');"));?>

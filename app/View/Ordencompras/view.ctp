<div class="ordencompras view">
<fieldset class="fieldset_marco">
				<legend class="titulo_marco"><?php  echo __('Orden compra');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Ordencompra']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ano Orden Compra'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Ordencompra']['ano_orden_compra']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Orden Compra'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Ordencompra']['numero_orden_compra']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Orden Compra'); ?></dt>
		<dd>
			<?php echo h(cambiar_formato_fecha($ordencompra['Ordencompra']['fecha_orden_compra'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordencomprastipo'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Ordencomprastipo']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Area']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Serviciosrealizado'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Serviciosrealizado']['numero_de_servicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proveedore'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Proveedore']['razon_social']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proveedoresvendedore'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Proveedoresvendedore']['nombres_y_apellidos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proveedoresbanco'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Proveedoresbanco']['cuenta_bancaria']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Forma Entrega'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Formaentrega']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Forma Pago'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Formapago']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Condicion Pago'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Condicionpago']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cotizacion Referencia'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Ordencompra']['cotizacion_referencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observacion'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Ordencompra']['observacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('porcentaje igv'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Ordencompra']['porcentaje_igv']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Administrador'); ?></dt>
		<dd>
			<?php echo h($ordencompra['Administrador']['Usuario']); ?>
			&nbsp;
		</dd>
	</dl>
<table cellpadding="0" cellspacing="0" class="grilla">
	<tr>
			<th><?php echo __('Código');?></th>
			<th><?php echo __('Unidad de medida');?></th>
			<th><?php echo __('Denominación');?></th>
			<th><?php echo __('Cantidad');?></th>
			<th><?php echo __('precio unitario');?></th>
			<th><?php echo __('total');?></th>
	</tr>
	<?php
	$i = 0;
	$total = 0;
	foreach ($ordencompra["Ordencomprasproducto"] as $ordencompraproducto): ?>
	<?php $total += $ordencompraproducto['cantidad']*$ordencompraproducto['precio_unitario']; ?>
	<tr>
		<td><?php echo h($ordencompraproducto['producto_id']); ?>&nbsp;</td>
		<td><?php echo h($ordencompraproducto['Producto']['Productosmedida']["denominacion"]); ?>&nbsp;</td>
		<td><?php echo h($ordencompraproducto['Producto']['denominacion']); ?>&nbsp;</td>
		<td><?php echo Formato($ordencompraproducto['cantidad'],2); ?>&nbsp;</td>
		<td><?php echo Formato($ordencompraproducto['precio_unitario'],2); ?></td>
		<td><?php echo Formato($ordencompraproducto['cantidad']*$ordencompraproducto['precio_unitario'],2); ?></td>
	</tr>
<?php endforeach; ?>
</table>
	<table><?php
	             $igv1= $total * ($ordencompra['Ordencompra']['porcentaje_igv']/100);
	       ?>
	        <tr><td>sub total</td></tr>
			<tr><td><?php echo $this->Form->input('sub_total1', array('label'=>false, 'readonly'=>true, 'value'=>Formato($total,2)));?></td></tr>
			<tr><td>Total % I.G.V</td></tr>
			<tr><td><?php echo $this->Form->input('igv1',       array('label'=>false, 'readonly'=>true, 'value'=>Formato($igv1,2)));?></td></tr>
			<tr><td>Total</td></tr>
			<tr><td><?php echo $this->Form->input('total1',     array('label'=>false, 'readonly'=>true, 'value'=>Formato($total+$igv1,2)));?></td></tr>
	</table>

	</fieldset>
</div>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Ordencompras/index','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Ordencompras/add','principal');"));?>


<div class="requematedetalles view">
<fieldset class="fieldset_marco">
				<legend class="titulo_marco"><?php  echo __('Requerimiento de Materiales');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Requerimiento'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['numero_requerimiento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Requerimiento'); ?></dt>
		<dd>
			<?php echo h(cambiar_formato_fecha($requematedetalle['Requematedetalle']['fecha_requerimiento'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Salida'); ?></dt>
		<dd>
			<?php echo h(cambiar_formato_fecha($requematedetalle['Requematedetalle']['fecha_salida'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Obra'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['numero_obra']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area 1'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['area_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area 2'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['area_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Departamento'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['departamento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Centro Costo'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['centro_costo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Solicitada Por'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['solicitada_por']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Solicitada Por'); ?></dt>
		<dd>
			<?php echo h(cambiar_formato_fecha($requematedetalle['Requematedetalle']['fecha_solicitada_por'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Solicitada Por'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['hora_solicitada_por']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Revisado Por 1'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['revisado_por_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Revisado Por 1'); ?></dt>
		<dd>
			<?php echo h(cambiar_formato_fecha($requematedetalle['Requematedetalle']['fecha_revisado_por_1'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Revisado Por 1'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['hora_revisado_por_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Revisado Por 2'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['revisado_por_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Revisado Por 2'); ?></dt>
		<dd>
			<?php echo h(cambiar_formato_fecha($requematedetalle['Requematedetalle']['fecha_revisado_por_2'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Revisado Por 2'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['hora_revisado_por_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Servicio'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['servicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Actividad'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['actividad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lugar Entrega'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['lugar_entrega']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nota'); ?></dt>
		<dd>
			<?php echo h($requematedetalle['Requematedetalle']['nota']); ?>
			&nbsp;
		</dd>
	</dl>
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
		foreach ($requematedetalle["Requemateproducto"] as $requemateproducto): ?>
		<tr>
			<td><?php echo h($requemateproducto['producto_id']); ?>&nbsp;</td>
			<td><?php echo h($requemateproducto['Producto']['Productosmedida']["denominacion"]); ?>&nbsp;</td>
			<td><?php echo h($requemateproducto['Producto']['denominacion']); ?>&nbsp;</td>
			<td><?php echo Formato($requemateproducto['cantidad'],2); ?>&nbsp;</td>
		</tr>
		<?php endforeach; ?>
	</table>
	</fieldset>
</div>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Requematedetalles/index','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Requematedetalles/add','principal');"));?>

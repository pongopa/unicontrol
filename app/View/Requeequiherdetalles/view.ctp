<div class="requeequiherdetalles view">
<fieldset class="fieldset_marco">
				<legend class="titulo_marco"><?php  echo __('Requerimiento de herramientas Equipos y materiales');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($requeequiherdetalle['Requeequiherdetalle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Requerimiento'); ?></dt>
		<dd>
			<?php echo h($requeequiherdetalle['Requeequiherdetalle']['numero_requerimiento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Requerimiento'); ?></dt>
		<dd>
			<?php echo h(cambiar_formato_fecha($requeequiherdetalle['Requeequiherdetalle']['fecha_requerimiento'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Requerimiento'); ?></dt>
		<dd>
			<?php echo h($requeequiherdetalle['Requeequiherdetalle']['hora_requerimiento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Entrada'); ?></dt>
		<dd>
			<?php echo h(cambiar_formato_fecha($requeequiherdetalle['Requeequiherdetalle']['fecha_entrada'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area'); ?></dt>
		<dd>
			<?php echo h($requeequiherdetalle['Area']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Solicitado Por'); ?></dt>
		<dd>
			<?php echo h($requeequiherdetalle['Solicitada']['nombre_completo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Número de Servicio'); ?></dt>
		<dd>
			<?php echo h($requeequiherdetalle['Serviciosrealizado']['numero_de_servicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('detalle de Servicio'); ?></dt>
		<dd>
			<?php echo h($requeequiherdetalle['Serviciosrealizado']['detalle']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Aprovado Por'); ?></dt>
		<dd>
			<?php echo h($requeequiherdetalle['Gerente']['nombre_completo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aprovado'); ?></dt>
		<dd>
			<?php echo h($requeequiherdetalle['Requeequiherdetalle']['aprobado']==1?"SI":"NO"); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Aprovado'); ?></dt>
		<dd>
			<?php echo h(cambiar_formato_fecha($requeequiherdetalle['Requeequiherdetalle']['fecha_aprobado'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Aprovado'); ?></dt>
		<dd>
			<?php echo h($requeequiherdetalle['Requeequiherdetalle']['hora_aprobado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estatus'); ?></dt>
		<dd>
			<?php echo h($requeequiherdetalle['Statuse']['denominacion']); ?>
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
		foreach ($requeequiherdetalle["Requeequiherproducto"] as $requeequiherproducto): ?>
		<tr>
			<td><?php echo h($requeequiherproducto['producto_id']); ?>&nbsp;</td>
			<td><?php echo h($requeequiherproducto['Producto']['Productosmedida']["denominacion"]); ?>&nbsp;</td>
			<td><?php echo h($requeequiherproducto['Producto']['denominacion']); ?>&nbsp;</td>
			<td><?php echo Formato($requeequiherproducto['cantidad'],2); ?>&nbsp;</td>
		</tr>
		<?php endforeach; ?>
	</table>
	</fieldset>
</div>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Requeequiherdetalles/index','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Requeequiherdetalles/add','principal');"));?>

<div class="serviciosrealizados view">
<fieldset class="fieldset_marco">
	<legend class="titulo_marco"><?php  echo __('Servicios realizado');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Serviciosrealizado']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero de Servicio'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Serviciosrealizado']['numero_de_servicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Cliente']['ruc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contacto del cliente'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Clientesvendedore']['nombres_y_apellidos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ubicacion del servicio'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Clientesucursa']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Detalle'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Serviciosrealizado']['detalle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Responsable'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Usuario']['usuario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Personal Requerido'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Serviciosrealizado']['personal_requerido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Inicio'); ?></dt>
		<dd>
			<?php echo h(cambiar_formato_fecha($serviciosrealizado['Serviciosrealizado']['fecha_inicio'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Fin'); ?></dt>
		<dd>
			<?php echo h(cambiar_formato_fecha($serviciosrealizado['Serviciosrealizado']['fecha_fin'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Statuse'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Statuse']['denominacion']); ?>
			&nbsp;
		</dd>
		 <dt><?php echo __('cotización'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Serviciosrealizado']['cotizacion']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('orden compra'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Serviciosrealizado']['orden_compra']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('facturado'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Serviciosrealizado']['facturado']==1?"si":"no"); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Número facturado'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Serviciosrealizado']['numero_factura']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tareo'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Serviciosrealizado']['tareo']==1?"si":"no"); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Informe'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Serviciosrealizado']['informe']==1?"si":"no"); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conformidad'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Serviciosrealizado']['conformidad']==1?"si":"no"); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observaciones'); ?></dt>
		<dd>
			<?php echo h($serviciosrealizado['Serviciosrealizado']['observaciones']); ?>
			&nbsp;
		</dd>
	</dl>
	</fieldset>
</div>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Serviciosrealizados/index','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Serviciosrealizados/add','principal');"));?>


<div class="productos view">
<fieldset class="fieldset_marco">
				<legend class="titulo_marco"><?php  echo __('Producto ó Servicio');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($producto['Producto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clasificación'); ?></dt>
		<dd>
			<?php echo h($producto['Producto']['clasificacion']==1?"Producto":"Servicio"); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Productos tipo'); ?></dt>
		<dd>
			<?php echo h($producto['Productostipo']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominacion'); ?></dt>
		<dd>
			<?php echo h($producto['Producto']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Productosmedida'); ?></dt>
		<dd>
			<?php echo h($producto['Productosmedida']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($producto['Producto']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
	</fieldset>
</div>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Productos/index','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Productos/add','principal');"));?>

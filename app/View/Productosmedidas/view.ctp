<div class="productosmedidas view">
<fieldset class="fieldset_marco">
				<legend class="titulo_marco"><?php  echo __('Productos medida');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productosmedida['Productosmedida']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominacion'); ?></dt>
		<dd>
			<?php echo h($productosmedida['Productosmedida']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Abreviacion'); ?></dt>
		<dd>
			<?php echo h($productosmedida['Productosmedida']['abreviacion']); ?>
			&nbsp;
		</dd>
	</dl>
	</fieldset>
</div>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Productosmedidas/index','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Productosmedidas/add','principal');"));?>


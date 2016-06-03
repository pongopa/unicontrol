<div class="rubros view">
	<fieldset class="fieldset_marco">
				<legend class="titulo_marco"><?php  echo __('Rubro');?></legend>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($rubro['Rubro']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Denominacion'); ?></dt>
			<dd>
				<?php echo h($rubro['Rubro']['denominacion']); ?>
				&nbsp;
			</dd>
		</dl>
	</fieldset>
</div>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Rubros/index','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Rubros/add','principal');"));?>

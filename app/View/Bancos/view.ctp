<div class="bancos view">
	<fieldset class="fieldset_marco">
		<legend class="titulo_marco"><?php  echo __('Banco');?></legend>
			<dl>
				<dt><?php echo __('Id'); ?></dt>
				<dd>
					<?php echo h($banco['Banco']['id']); ?>
					&nbsp;
				</dd>
				<dt><?php echo __('Denominacion'); ?></dt>
				<dd>
					<?php echo h($banco['Banco']['denominacion']); ?>
					&nbsp;
				</dd>
			</dl>
	</fieldset>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Bancos/index','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Bancos/add','principal');"));?>
</div>


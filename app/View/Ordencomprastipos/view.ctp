<div class="ordencomprastipos view">
	<fieldset class="fieldset_marco">
				<legend class="titulo_marco"><?php  echo __('Orden compras tipo');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ordencomprastipo['Ordencomprastipo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominacion'); ?></dt>
		<dd>
			<?php echo h($ordencomprastipo['Ordencomprastipo']['denominacion']); ?>
			&nbsp;
		</dd>
	</dl>
	</fieldset>
</div>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Ordencomprastipos/index','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Ordencomprastipos/add','principal');"));?>
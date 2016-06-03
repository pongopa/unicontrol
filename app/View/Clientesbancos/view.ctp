<div class="clientesbancos view">
<fieldset class="fieldset_marco">
		<legend class="titulo_marco"><?php  echo __('Cliente banco');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientesbanco['Clientesbanco']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo h($clientesbanco['Cliente']['ruc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Banco'); ?></dt>
		<dd>
			<?php echo h($clientesbanco['Banco']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cuenta Bancaria'); ?></dt>
		<dd>
			<?php echo h($clientesbanco['Clientesbanco']['cuenta_bancaria']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Moneda'); ?></dt>
		<dd>
			<?php echo h($clientesbanco['Clientesbanco']['tipo_moneda']); ?>
			&nbsp;
		</dd>
	</dl>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Clientesbancos/index','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Clientesbancos/add','principal');"));?>
</fieldset>
</div>

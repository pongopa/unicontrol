<div class="proveedoresvendedores view">
<fieldset class="fieldset_marco">
		<legend class="titulo_marco"><?php  echo __('Proveedor vendedor');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($proveedoresvendedore['Proveedoresvendedore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proveedore'); ?></dt>
		<dd>
			<?php echo h($proveedoresvendedore['Proveedore']['ruc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombres Y Apellidos'); ?></dt>
		<dd>
			<?php echo h($proveedoresvendedore['Proveedoresvendedore']['nombres_y_apellidos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cell 1'); ?></dt>
		<dd>
			<?php echo h($proveedoresvendedore['Proveedoresvendedore']['cell_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cell 2'); ?></dt>
		<dd>
			<?php echo h($proveedoresvendedore['Proveedoresvendedore']['cell_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cell 3'); ?></dt>
		<dd>
			<?php echo h($proveedoresvendedore['Proveedoresvendedore']['cell_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email 1'); ?></dt>
		<dd>
			<?php echo h($proveedoresvendedore['Proveedoresvendedore']['email_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email 2'); ?></dt>
		<dd>
			<?php echo h($proveedoresvendedore['Proveedoresvendedore']['email_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email 3'); ?></dt>
		<dd>
			<?php echo h($proveedoresvendedore['Proveedoresvendedore']['email_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email 4'); ?></dt>
		<dd>
			<?php echo h($proveedoresvendedore['Proveedoresvendedore']['email_4']); ?>
			&nbsp;
		</dd>
	</dl>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Proveedoresvendedores/index','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input', 'onclick'=>"ver_documento('/Proveedoresvendedores/add','principal');"));?>
</fieldset>
</div>


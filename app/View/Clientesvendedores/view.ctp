<div class="clientesvendedores view">
<fieldset class="fieldset_marco">
		<legend class="titulo_marco"><?php  echo __('Cliente contacto');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientesvendedore['Clientesvendedore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo h($clientesvendedore['Cliente']['ruc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombres Y Apellidos'); ?></dt>
		<dd>
			<?php echo h($clientesvendedore['Clientesvendedore']['nombres_y_apellidos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cell 1'); ?></dt>
		<dd>
			<?php echo h($clientesvendedore['Clientesvendedore']['cell_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cell 2'); ?></dt>
		<dd>
			<?php echo h($clientesvendedore['Clientesvendedore']['cell_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cell 3'); ?></dt>
		<dd>
			<?php echo h($clientesvendedore['Clientesvendedore']['cell_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pagina Web'); ?></dt>
		<dd>
			<?php echo h($clientesvendedore['Clientesvendedore']['pagina_web']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email 1'); ?></dt>
		<dd>
			<?php echo h($clientesvendedore['Clientesvendedore']['email_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email 2'); ?></dt>
		<dd>
			<?php echo h($clientesvendedore['Clientesvendedore']['email_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email 3'); ?></dt>
		<dd>
			<?php echo h($clientesvendedore['Clientesvendedore']['email_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email 4'); ?></dt>
		<dd>
			<?php echo h($clientesvendedore['Clientesvendedore']['email_4']); ?>
			&nbsp;
		</dd>
	</dl>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Clientesvendedores/index','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Clientesvendedores/add','principal');"));?>
</fieldset>
</div>

<div class="confDepartamentos view">
<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php  echo __('Departamento');?></legend>
	<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($confDepartamento['ConfDepartamento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conf Pais'); ?></dt>
		<dd>
			<?php echo h($confDepartamento['ConfPai']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominacion'); ?></dt>
		<dd>
			<?php echo h($confDepartamento['ConfDepartamento']['denominacion']); ?>
			&nbsp;
		</dd>
	</dl>
		<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/confDepartamentos/index/','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/confDepartamentos/add','principal');"));?>
</fieldset>
</div>

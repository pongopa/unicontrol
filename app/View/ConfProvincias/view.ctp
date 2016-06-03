<div class="confProvincias view">
<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php  echo __('Provincia');?></legend>
	<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($confProvincia['ConfProvincia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pais'); ?></dt>
		<dd>
			<?php echo h($confProvincia['ConfPai']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Departamento'); ?></dt>
		<dd>
			<?php echo h($confProvincia['ConfDepartamento']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominacion'); ?></dt>
		<dd>
			<?php echo h($confProvincia['ConfProvincia']['denominacion']); ?>
			&nbsp;
		</dd>
	</dl>
		<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/confProvincias/index/','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/confProvincias/add','principal');"));?>
</fieldset>
</div>

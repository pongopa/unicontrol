<div class="confDistritos view">
<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php  echo __('Distrito');?></legend>
	<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($confDistrito['ConfDistrito']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pais'); ?></dt>
		<dd>
			<?php echo h($confDistrito['ConfPai']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Departamento'); ?></dt>
		<dd>
			<?php echo h($confDistrito['ConfDepartamento']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Provincia'); ?></dt>
		<dd>
			<?php echo h($confDistrito['ConfProvincia']['denominacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominacion'); ?></dt>
		<dd>
			<?php echo h($confDistrito['ConfDistrito']['denominacion']); ?>
			&nbsp;
		</dd>
	</dl>
		<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/confDistritos/index/','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/confDistritos/add','principal');"));?>
</fieldset>
</div>

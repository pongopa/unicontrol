<div class="confPais view">
<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php  echo __('Pais');?></legend>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($confPai['ConfPai']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominacion'); ?></dt>
		<dd>
			<?php echo h($confPai['ConfPai']['denominacion']); ?>
			&nbsp;
		</dd>
	</dl>
		<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/confPais/index/','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/confPais/add','principal');"));?>
</fieldset>
</div>

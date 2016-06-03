<div class="estadocontribuyentes view">
<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php  echo __('Estadocontribuyente');?></legend>
	<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estadocontribuyente['Estadocontribuyente']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denominacion'); ?></dt>
		<dd>
			<?php echo h($estadocontribuyente['Estadocontribuyente']['denominacion']); ?>
			&nbsp;
		</dd>
	</dl>
		<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/estadocontribuyentes/index/','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/estadocontribuyentes/add','principal');"));?>
</fieldset>
</div>

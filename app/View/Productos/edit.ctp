<div class="productos form">
<?php echo $this->Ajax->form('Producto','post',array('model'=>'Producto','url'=>'/Productos/edit','update'=>'principal_add'));?>
<?php echo $this->Form->input('id',array('label'=>false)); ?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Editar Producto ó Servicio'); ?></legend>
 		<div id="principal_add"></div>
 		<table>
			<tr>
					<td><?php echo $this->Form->input('clasificacion',array('label'=>false,'type'=>'radio','options'=>array('1'=>'Producto','2'=>'Servicio'))); ?></td>
			</tr>
		</table>
		 <table>
 			<tr>
				<td>productos tipo</td>
				<td><?php echo $this->Form->input('productostipo_id', array('label'=>false));?></td>
			</tr>
			<tr>
					<td>denominacion</td>
					<td><?php echo $this->Form->input('denominacion', array('label'=>false));?></td>
			</tr>
			<tr>
					<td>productos medida</td>
					<td><?php echo $this->Form->input('productosmedida_id', array('label'=>false));?></td>
			</tr>
			<tr>
					<td>descripcion</td>
					<td><?php echo $this->Form->input('descripcion', array('label'=>false));?></td>
			</tr>
		</table>
	</fieldset>
<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Productos/index','principal');"));?>
</div>


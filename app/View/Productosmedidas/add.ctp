<div class="productosmedidas form">
	<?php echo $this->Ajax->form('Productosmedida','post',array('model'=>'Productosmedida','url'=>'/Productosmedidas/add','update'=>'principal_add'));?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Agregar Productos medida'); ?></legend>
 		<div id="principal_add"></div>
		  <table>
 			<tr>
				<td>denominacion</td>
				<td><?php echo $this->Form->input('denominacion', array('label'=>false));?></td>
			</tr>
			<tr>
				<td>abreviacion</td>
				<td><?php echo $this->Form->input('abreviacion', array('label'=>false));?></td>
			</tr>
         </table>
	</fieldset>
<?php echo $this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>
<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Productosmedidas/index','principal');"));?>
</div>






<?php
$this->Paginator->options(array('update' => 'cuerpo_buscar'));
$page = $this->Paginator->current();
?>
<div class="confDireccionConectadas index" style="height:300px; overflow:auto;">
	<table cellpadding="0" cellspacing="0" class="grilla">
	<tbody>
	<tr>
	        <td width="15%" align="left"><?php echo $this->Paginator->sort('codigo_producto','Código');?></td>
	        <td width="25%" align="left"><?php echo $this->Paginator->sort('Productostipo.denominacion', 'Tipo');?></td>
			<td width="25%" align="left"><?php echo $this->Paginator->sort('Productosmedida.denominacion', 'M.');?></td>
			<td width="50%" align="left"><?php echo $this->Paginator->sort('denominacion','Descripción');?></td>
			<td class="actions"><?php __('Acciones');?></td>
	</tr>
	<?php
	$i = 0;
	foreach ($CatalogoProductos as $CatalogoProducto):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $CatalogoProducto['Producto']['id']; ?>&nbsp;</td>
		<td><?php echo $CatalogoProducto['Productostipo']['denominacion']; ?></td>
		<td><?php echo $CatalogoProducto['Productosmedida']['denominacion']; ?></td>
		<td><?php echo $CatalogoProducto['Producto']['denominacion']; ?></td>
		<td class="actions">
			<?php echo $this->Ajax->link2($this->Html->image('acciones/view.png',array('border'=>0)),'/ComponenteProductos/seleccion_producto/'.$CatalogoProducto['Producto']['id'],array('onclick'=>'jQuery.modal.close();', 'update'=>'seleccion_producto','title'=>'Ver','escape'=>false),null); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<div class="paging">
		<?php echo $this->Paginator->prev('' . __('', true), array('class'=>'anterior_input'), null, array('class'=>'anterior_input_disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('', true) . '', array('class'=>'siguiente_input'), null, array('class' => 'siguiente_input_disabled'));?>
	</div>
</div>
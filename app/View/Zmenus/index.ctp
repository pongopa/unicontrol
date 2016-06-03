<?php
 $this->Paginator->options(array('update' => 'principal'));
 $page = $this->Paginator->current();
 ?>
<fieldset class="fieldset_marco">
 		<legend class="titulo_marco">modificar titulo</legend>
<div class="zmenus index">
	<table cellpadding="0" cellspacing="0" class="grilla">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('modulo_id');?></th>
			<th><?php echo $this->Paginator->sort('deno_menu');?></th>
			<th><?php echo $this->Paginator->sort('nivel');?></th>
			<th><?php echo $this->Paginator->sort('id_menu');?></th>
			<th><?php echo $this->Paginator->sort('orden_ubicacion');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('idcapa');?></th>
			<th><?php echo $this->Paginator->sort('tipo_inst');?></th>
			<th><?php echo $this->Paginator->sort('activo');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($zmenus as $zmenu):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $id=$zmenu['Zmenu']['id']; ?>&nbsp;</td>
		<td><?php echo $zmenu['Zmenu']['modulo_id']; ?>&nbsp;</td>
		<td><?php echo $zmenu['Zmenu']['deno_menu']; ?>&nbsp;</td>
		<td><?php echo $zmenu['Zmenu']['nivel']; ?>&nbsp;</td>
		<td><?php echo $zmenu['Zmenu']['id_menu']; ?>&nbsp;</td>
		<td><?php echo $zmenu['Zmenu']['orden_ubicacion']; ?>&nbsp;</td>
		<td><div id="url_<?=$id?>"><?php echo $zmenu['Zmenu']['url']; ?></div>&nbsp;<?

		//echo $this->Ajax->editor('url_'.$id,'/zmenus/editar_campo/'.$id);
		//printf("<script>new Ajax.InPlaceEditor($('url_%s'), '%s', {submitOnBlur: true, okButton: false, cancelLink: true,ajaxOptions: {method: 'post'}});</script>",$id,'/zmenus/editar/'.$id);

		?></td>
		<td><?php echo $zmenu['Zmenu']['idcapa']; ?>&nbsp;</td>
		<td><?php echo $zmenu['Zmenu']['tipo_inst']; ?>&nbsp;</td>
		<td><?php echo $zmenu['Zmenu']['activo']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Ajax->link2($this->Html->image('acciones/view.png',array('border'=>0)),'/zmenus/view/'.$zmenu['Zmenu']['id'].'/'.$page,array('update'=>'principal','title'=>'Ver','escape'=>false),null); ?>
			<?php echo $this->Ajax->link2($this->Html->image('acciones/edit.png',array('border'=>0)),'/zmenus/edit/'.$zmenu['Zmenu']['id'].'/'.$page,array('update'=>'principal','title'=>'Editar','escape'=>false),null); ?>
			<?php echo $this->Ajax->link2($this->Html->image('acciones/delete.png',array('border'=>0)),'/zmenus/delete/'.$zmenu['Zmenu']['id'].'/'.$page,array('update'=>'principal','title'=>'Eliminar','escape'=>false),'Está seguro que desea eliminar el registro indicado?'); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="desc_paging">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}', true)
	));
	?>	</div>

	<div class="paging">
		<?php echo $this->Paginator->prev('.' . __('', true), array('class'=>'anterior_input'), null, array('class'=>'anterior_input_disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('.', true) . '', array('class'=>'siguiente_input'), null, array('class' => 'siguiente_input_disabled'));?>
	</div>

</div>
</fieldset>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/zmenus/index/','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/zmenus/add','principal');"));?>

<?php
 $this->Paginator->options(array('update' => 'principal'));
 $page = $this->Paginator->current();
 ?>
<div class="confDistritos index">
    <fieldset class="fieldset_marco">
 	<legend class="titulo_marco"><?php echo __('Distrito');?></legend>
	<table cellpadding="0" cellspacing="0" class="grilla">
	<tr>
			<th><?php echo $this->Paginator->sort('conf_pai_id', 'pais');?></th>
			<th><?php echo $this->Paginator->sort('conf_departamento_id', 'departamento');?></th>
			<th><?php echo $this->Paginator->sort('conf_provincia_id', 'provincia');?></th>
			<th><?php echo $this->Paginator->sort('denominacion');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($confDistritos as $confDistrito): ?>
	<tr>
		<td>
			<?php echo h($confDistrito['ConfPai']['denominacion']); ?>
		</td>
		<td>
			<?php echo h($confDistrito['ConfDepartamento']['denominacion']); ?>
		</td>
		<td>
			<?php echo h($confDistrito['ConfProvincia']['denominacion']); ?>
		</td>
		<td><?php echo h($confDistrito['ConfDistrito']['denominacion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Ajax->link2($this->Html->image('acciones/view.png',array('border'=>0)),'/confDistritos/view/'.$confDistrito['ConfDistrito']['id'].'/'.$page,array('update'=>'principal','title'=>'Ver','escape'=>false),null); ?>
			<?php echo $this->Ajax->link2($this->Html->image('acciones/edit.png',array('border'=>0)),'/confDistritos/edit/'.$confDistrito['ConfDistrito']['id'].'/'.$page,array('update'=>'principal','title'=>'Editar','escape'=>false),null); ?>
			<?php echo $this->Ajax->link2($this->Html->image('acciones/delete.png',array('border'=>0)),'/confDistritos/delete/'.$confDistrito['ConfDistrito']['id'].'/'.$page,array('update'=>'principal','title'=>'Eliminar','escape'=>false),'Está seguro que desea eliminar el registro indicado?'); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="desc_paging">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, que muestra {:current} registros de un total de  {:count}, a partir del registro {:start}, terminando en el {:end}', true)
	));
	?>	</div>
	<div class="paging">
		<?php echo $this->Paginator->prev('' . __('', true), array('class'=>'anterior_input'), null, array('class'=>'anterior_input_disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('', true) . '', array('class'=>'siguiente_input'), null, array('class' => 'siguiente_input_disabled'));?>
	</div>
		<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/confDistritos/index/','principal');"));?>
		<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/confDistritos/add','principal');"));?>
	</fieldset>
</div>

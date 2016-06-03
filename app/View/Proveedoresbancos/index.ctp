<?php
$page = $this->Paginator->current();
$this->Paginator->options(array('update' => 'principal'));
?>
<div class="proveedoresbancos index">
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php echo __('Proveedor banco');?></legend>
	<table cellpadding="0" cellspacing="0" class="grilla">
	<tr>
			<th><?php echo $this->Paginator->sort('proveedore_id');?></th>
			<th><?php echo $this->Paginator->sort('banco_id');?></th>
			<th><?php echo $this->Paginator->sort('cuenta_bancaria');?></th>
			<th><?php echo $this->Paginator->sort('tipo_moneda');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($proveedoresbancos as $proveedoresbanco): ?>
	<tr>
		<td>
			<?php echo h($proveedoresbanco['Proveedore']['ruc']); ?>
		</td>
		<td>
			<?php echo h($proveedoresbanco['Banco']['denominacion']); ?>
		</td>
		<td><?php echo h($proveedoresbanco['Proveedoresbanco']['cuenta_bancaria']); ?>&nbsp;</td>
		<td><?php echo h($proveedoresbanco['Proveedoresbanco']['tipo_moneda']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Ajax->link2($this->Html->image('acciones/view.png',array('border'=>0)),  '/Proveedoresbancos/view/'.$proveedoresbanco['Proveedoresbanco']['id'].'/'.$page,  array('update'=>'principal','title'=>'Ver','escape'=>false),null); ?>
			<?php echo $this->Ajax->link2($this->Html->image('acciones/edit.png',array('border'=>0)),  '/Proveedoresbancos/edit/'.$proveedoresbanco['Proveedoresbanco']['id'].'/'.$page,  array('update'=>'principal','title'=>'Editar','escape'=>false),null); ?>
			<?php echo $this->Ajax->link2($this->Html->image('acciones/delete.png',array('border'=>0)),'/Proveedoresbancos/delete/'.$proveedoresbanco['Proveedoresbanco']['id'].'/'.$page,array('update'=>'principal','title'=>'Eliminar','escape'=>false),'Está seguro que desea eliminar el registro indicado?'); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="desc_paging">
				<?php
				echo $this->Paginator->counter(array(
				'format' => __('Página {:page} de {:pages}, que muestra {:current} registros de un total de  {:count}, a partir del registro {:start}, terminando en el {:end}', true)
				));
				?>
			</div>
			<div class="paging">
				<?php echo $this->Paginator->prev('.' . __('', true), array('class'=>'anterior_input'), null, array('class'=>'anterior_input_disabled'));?>
				| <?php echo $this->Paginator->numbers();?> |
				<?php echo $this->Paginator->next(__('.', true) . '', array('class'=>'siguiente_input'), null, array('class' => 'siguiente_input_disabled'));?>
			</div>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Proveedoresbancos/index','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Proveedoresbancos/add','principal');"));?>
	</fieldset>
</div>

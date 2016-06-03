<?php
$page = $this->Paginator->current();
$this->Paginator->options(array('update' => 'principal'));
?>
<div class="serviciosrealizados index">
	<fieldset class="fieldset_marco">
	 	<legend class="titulo_marco"><?php echo __('Servicios realizado');?></legend>
	<table cellpadding="0" cellspacing="0" class="grilla">
	<tr>
			<th><?php echo $this->Paginator->sort('numero_de_servicio');?></th>
			<th><?php echo $this->Paginator->sort('cliente_id');?></th>
			<th><?php echo $this->Paginator->sort('detalle');?></th>
			<th><?php echo $this->Paginator->sort('responsable');?></th>

			<th><?php echo $this->Paginator->sort('staus');?></th>
			<th><?php echo $this->Paginator->sort('orden compra');?></th>
			<th><?php echo $this->Paginator->sort('facturado');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($serviciosrealizados as $serviciosrealizado): ?>
	<tr>
		<td><?php echo h($serviciosrealizado['Serviciosrealizado']['numero_de_servicio']); ?>&nbsp;</td>
		<td>
			<?php echo h($serviciosrealizado['Cliente']['nombre_comercial']); ?>
		</td>
		<td><?php echo h($serviciosrealizado['Serviciosrealizado']['detalle']); ?>&nbsp;</td>
		<td>
			<?php echo h($serviciosrealizado['Usuario']['usuario']); ?>
		</td>
		<td>
			<?php echo h($serviciosrealizado['Statuse']['denominacion']); ?>
		</td>
		<td>
			<?php echo h($serviciosrealizado['Serviciosrealizado']['orden_compra']); ?>
		</td>
		<td>
			<?php echo h($serviciosrealizado['Serviciosrealizado']['facturado']==1?"SI":"NO"); ?>
		</td>
		<td class="actions">
			<?php echo $this->Ajax->link2($this->Html->image('acciones/view.png',array('border'=>0)),  '/Serviciosrealizados/view/'.$serviciosrealizado['Serviciosrealizado']['id'].'/'.$page,  array('update'=>'principal','title'=>'Ver','escape'=>false),null); ?>
			<?php echo $this->Ajax->link2($this->Html->image('acciones/edit.png',array('border'=>0)),  '/Serviciosrealizados/edit/'.$serviciosrealizado['Serviciosrealizado']['id'].'/'.$page,  array('update'=>'principal','title'=>'Editar','escape'=>false),null); ?>
			<?php echo $this->Ajax->link2($this->Html->image('acciones/delete.png',array('border'=>0)),'/Serviciosrealizados/delete/'.$serviciosrealizado['Serviciosrealizado']['id'].'/'.$page,array('update'=>'principal','title'=>'Eliminar','escape'=>false),'Está seguro que desea eliminar el registro indicado?'); ?>
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
	</fieldset>
</div>

	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/Serviciosrealizados/index','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/Serviciosrealizados/add','principal');"));?>

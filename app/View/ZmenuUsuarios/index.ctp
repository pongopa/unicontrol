<?php
 $this->Paginator->options(array('update' => 'principal'));
 $page = $this->Paginator->current();
 ?>
<fieldset class="fieldset_marco">
 		<legend class="titulo_marco">RESTRICCIONES usuarios</legend>

 <?php $this->Form->view_busqueda_index('ZmenuUsuario',
                                       '/ZmenuUsuarios/index/2',
                                       'principal',
                                        array('activa'=>2,
                                              'name'  =>'Condición Actividad',
                                              'datos' =>array('1'=>'Activos', '2'=>'Anulados','todo'=>'Todos')
                                             )
                                       ); ?>


<div class="zmenuUsuarios index">
	<table cellpadding="0" cellspacing="0" class="grilla">
	<tr>

			<th><?php echo $this->Paginator->sort('usuario_id');?></th>
			<th><?php echo $this->Paginator->sort('modulo_id');?></th>
			<th><?php echo $this->Paginator->sort('Menu','zmenu_id');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($zmenuUsuarios as $zmenuUsuario):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>

		<td><?php echo $zmenuUsuario['Usuario']['usuario']; ?></td>
		<td><?php echo $zmenuUsuario['Modulo']['denominacion']; ?></td>
		<td><?php echo $zmenuUsuario['Zmenu']['deno_menu']; ?></td>
		<td class="actions">
			<?php echo $this->Html->image('acciones/view.png',array('border'=>0)); ?>
		   <?php if($zmenuUsuario['ZmenuUsuario']['activo']==1){?>
				<?php echo $this->Html->image('acciones/edit.png',array('border'=>0)); ?>
				<?php echo $this->Ajax->link2($this->Html->image('tick.png',array('border'=>0)),'/zmenuUsuarios/delete/'.$zmenuUsuario['ZmenuUsuario']['id'].'/'.$page,array('update'=>'principal','escape'=>false),'Está seguro que desea desactivar este enlace para el usuario'); ?>
		    <?php }else{?>
	            <?php echo $this->Html->image('acciones/edit.png',array('border'=>0)); ?>
				<?php echo $this->Ajax->link2($this->Html->image('tick_amarillo.png',array('border'=>0)),'/zmenuUsuarios/activa/'.$zmenuUsuario['ZmenuUsuario']['id'].'/'.$page,array('update'=>'principal','escape'=>false),'Está seguro que desea activar este enlace para el usuario'); ?>
		    <?php } ?>
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
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/zmenuUsuarios/index/','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/zmenuUsuarios/add','principal');"));?>

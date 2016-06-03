<?php
 $this->Paginator->options(array('update' => 'principal'));
 $page = $this->Paginator->current();
 ?>
<fieldset class="fieldset_marco">
 		<legend class="titulo_marco">RESTRICCIONES Módulos</legend>

 <?php $this->Form->view_busqueda_index('ModuloUsuario',
                                       '/ModuloUsuarios/index/2',
                                       'principal',
                                        array('activa'=>2,
                                              'name'  =>'Condición Actividad',
                                              'datos' =>array('1'=>'Activos', '2'=>'Anulados','todo'=>'Todos')
                                             )
                                       ); ?>
<div class="moduloUsuarios index">
	<table cellpadding="0" cellspacing="0" class="grilla">
	<tr>
			<th><?php echo $this->Paginator->sort('Usuarios', 'usuario_id');?></th>
			<th><?php echo $this->Paginator->sort('Módulo','modulo_id');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($moduloUsuarios as $moduloUsuario):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
	    <td>
			<?php echo $moduloUsuario['Usuario']['usuario']; ?>
		</td>
		<td>
			<?php echo $moduloUsuario['Modulo']['denominacion']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->image('acciones/view.png',array('border'=>0)); ?>

			<?php if($moduloUsuario['ModuloUsuario']['activo']==1){?>
				<?php echo $this->Html->image('acciones/edit.png',array('border'=>0)); ?>
				<?php echo $this->Ajax->link2($this->Html->image('tick.png',array('border'=>0)),'/ModuloUsuarios/delete/'.$moduloUsuario['ModuloUsuario']['id'].'/'.$page,array('update'=>'principal','escape'=>false),'Está seguro que desea desactivar este modulo para el usuario'); ?>
		    <?php }else{?>
	            <?php echo $this->Html->image('acciones/edit.png',array('border'=>0)); ?>
				<?php echo $this->Ajax->link2($this->Html->image('tick_amarillo.png',array('border'=>0)),'/ModuloUsuarios/activa/'.$moduloUsuario['ModuloUsuario']['id'].'/'.$page,array('update'=>'principal','escape'=>false),'Está seguro que desea activar este modulo para el usuario'); ?>
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
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/ModuloUsuarios/index/','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/ModuloUsuarios/add','principal');"));?>

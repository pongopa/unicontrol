<?
if($this->Session->read('conf_nivel')==1){
	$titu = 'Usuario Principal del Ente adscrito';
}else{
	$titu = 'Usuario del Ente adscrito';
}

//$this->Paginator->options(array('update' => 'principal'));
$page = $this->Paginator->current();
$this->Paginator->options(array('update' => 'principal','url' => array($nivel)));
//echo $this->Paginator->current();

?>

<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php __($titu); ?></legend>

 <?php $this->Form->view_busqueda_index('ConfUsuario',
                                       '/ConfUsuarios/index/no/2',
                                       'principal',
                                        array('activa'=>2,
                                              'name'  =>'Condición Actividad',
                                              'datos' =>array('1'=>'Activos', '2'=>'Anulados','todo'=>'Todos')
                                             )
                                       ); ?>


<div class="usuarios index">
	<table cellpadding="0" cellspacing="0" class="grilla">
	<tr>
			<th><?php echo $this->Paginator->sort('Ente adscrito','dependencia_id');?></th>
			<th><?php echo $this->Paginator->sort('usuario');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	$activo[1]="Si";
	$activo[0]="No";
	foreach ($usuarios as $usuario):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $usuario['Dependencia']['denominacion']; ?></td>
		<td><?php echo $usuario['Usuario']['usuario']; ?>&nbsp;</td>
		<td><?php echo $usuario['Usuario']['email']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Ajax->link2($this->Html->image('acciones/view.png',array('border'=>0)),'/conf_usuarios/view/'.$usuario['Usuario']['id'].'/'.$page,array('update'=>'principal','escape'=>false),null); ?>


			<?php if($usuario['Usuario']['activo']==1){?>
				<?php echo $this->Ajax->link2($this->Html->image('acciones/edit.png',array('border'=>0)),'/conf_usuarios/edit/'.$usuario['Usuario']['id'].'/'.$page,array('update'=>'principal','escape'=>false),null); ?>
				<?php echo $this->Ajax->link2($this->Html->image('tick.png',array('border'=>0)),'/conf_usuarios/delete/'.$usuario['Usuario']['id'].'/'.$page,array('update'=>'principal','escape'=>false),'Está seguro que desea desactivar este usuario'); ?>
		    <?php }else{?>
	            <?php echo $this->Ajax->link2($this->Html->image('acciones/edit.png',array('border'=>0)),'/conf_usuarios/edit/'.$usuario['Usuario']['id'].'/'.$page,array('update'=>'principal','escape'=>false),null); ?>
				<?php echo $this->Ajax->link2($this->Html->image('tick_amarillo.png',array('border'=>0)),'/conf_usuarios/activa/'.$usuario['Usuario']['id'].'/'.$page,array('update'=>'principal','escape'=>false),'Está seguro que desea activar este usuario'); ?>
		    <?php } ?>
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
		<?php echo $this->Paginator->prev('.' . __('', true), array('class'=>'anterior_input'), null, array('class'=>'disabled'));?>
        | <?php echo $this->Paginator->numbers();   ?> |
		<?php echo $this->Paginator->next(__('.', true) . '', array('class'=>'siguiente_input'), null, array('class' => 'disabled'));?>
	</div>
</div>

</fieldset>

<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa_ajax','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/conf_usuarios/index','principal');"));?>
<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/conf_usuarios/add','principal');"));?>
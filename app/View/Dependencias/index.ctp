<?php
 $this->Paginator->options(array('update' => 'principal'));
 $page = $this->Paginator->current();

?>
<fieldset class="fieldset_marco">
 		<legend class="titulo_marco">Entes adscritos</legend>
<div class="dependencias index">
	<table cellpadding="0" cellspacing="0" class="grilla">
	<tr>
	        <th><?php echo $this->Paginator->sort('Código');?></th>
			<th><?php echo $this->Paginator->sort('denominacion');?></th>
			<th><?php echo $this->Paginator->sort('Tipo de Ente adscrito', 'tipo_dependencia');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($dependencias as $dependencia):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
	    <td align="center"><?php echo mascara($dependencia['Dependencia']['codigo_dependencia'],4); ?>&nbsp;</td>
		<td><?php echo $dependencia['Dependencia']['denominacion']; ?>&nbsp;</td>
		<td><?php echo $dependencia['Dependencia']['tipo_dependencia']==1?'Centralizada':'Descentralizada'; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Ajax->link2($this->Html->image('acciones/view.png',array('border'=>0)),'/dependencias/view/'.$dependencia['Dependencia']['id'],array('update'=>'principal','title'=>'Ver','escape'=>false),null); ?>

		   <?php if($dependencia['Dependencia']['condicion_actividad']==1){?>
				<?php echo $this->Ajax->link2($this->Html->image('acciones/edit.png',array('border'=>0)),'/dependencias/edit/'.$dependencia['Dependencia']['id'].'/'.$page,array('update'=>'principal','escape'=>false),null); ?>
				<?php echo $this->Ajax->link2($this->Html->image('tick.png',array('border'=>0)),'/dependencias/delete/'.$dependencia['Dependencia']['id'].'/'.$page,array('update'=>'principal','escape'=>false),'Está seguro que desea desactivar esta dependencia'); ?>
		    <?php }else{?>
	            <?php echo $this->Ajax->link2($this->Html->image('acciones/edit.png',array('border'=>0)),'/dependencias/edit/'.$dependencia['Dependencia']['id'].'/'.$page,array('update'=>'principal','escape'=>false),null); ?>
				<?php echo $this->Ajax->link2($this->Html->image('tick_amarillo.png',array('border'=>0)),'/dependencias/activa/'.$dependencia['Dependencia']['id'].'/'.$page,array('update'=>'principal','escape'=>false),'Está seguro que desea activar esta dependencia'); ?>
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
		<?php echo $this->Paginator->prev('.' . __('', true), array('class'=>'anterior_input'), null, array('class'=>'anterior_input_disabled'));?>
		| <?php echo $this->Paginator->numbers();?> |
		<?php echo $this->Paginator->next(__('.', true) . '', array('class'=>'siguiente_input'), null, array('class' => 'siguiente_input_disabled'));?>
	</div>
</div>
</fieldset>
	<?php echo $this->Form->button('',array('class'=>'salir_input','onclick'=>"ver_documento('/modulos/salir_programa','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'consultar_input','onclick'=>"ver_documento('/dependencias/index','principal');"));?>
	<?php echo $this->Form->button('',array('class'=>'regresar_input','onclick'=>"ver_documento('/dependencias/add','principal');"));?>

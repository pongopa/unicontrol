<?php
$this->Paginator->options(array('update' => 'cuerpo_buscar_rubro'));
$page = $this->Paginator->current();
?>

<div class="confDireccionConectadas index" style="height:300px; overflow:auto;">
	<table cellpadding="0" cellspacing="0" class="grilla">
	<tbody>
	<tr>
			<td width="90%" align="left"><?php echo $this->Paginator->sort('denominacion','Rubro');?></td>
			<td class="actions"><?php echo __('Acciones');?></td>
	</tr>
	<?php
	$i = 0;
	foreach ($Rubros as $Rubro):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $Rubro['Rubro']['denominacion']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Ajax->link2($this->Html->image('acciones/view.png',array('border'=>0)),'/ComponenteProveedor/seleccion_rubro/'.$Rubro['Rubro']['id'],array('onclick'=>'jQuery.modal.close();', 'update'=>'seleccion_rubro','title'=>'Ver','escape'=>false),null); ?>
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
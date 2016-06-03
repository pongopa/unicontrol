<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php


echo "<?php" .
		"\n" .
		" \$this->Paginator->options(array('update' => 'principal'));\n" .
		" \$page = \$this->Paginator->current();\n ?>\n";


?>
<div class="<?php echo $pluralVar;?> index">
    <fieldset class="fieldset_marco">
 	<legend class="titulo_marco"><?php echo "<?php echo __('{$pluralHumanName}');?>";?></legend>
	<table cellpadding="0" cellspacing="0" class="grilla">
	<tr>
	<?php  foreach ($fields as $field):?>
		<th><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>";?></th>
	<?php endforeach;?>
		<th class="actions"><?php echo "<?php echo __('Actions');?>";?></th>
	</tr>
	<?php
	echo "<?php
	\$i = 0;
	foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
	echo "\t<tr>\n";
		foreach ($fields as $field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
						break;
					}
				}
			}
			if ($isKey !== true) {
				echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
			}
		}

		echo "\t\t<td class=\"actions\">\n";
		echo "\t\t\t<?php echo \$this->Ajax->link2(\$this->Html->image('acciones/view.png',array('border'=>0)),'/$pluralVar/view/'.\${$singularVar}['{$modelClass}']['{$primaryKey}'].'/'.\$page,array('update'=>'principal','title'=>'Ver','escape'=>false),null); ?>\n";
		echo "\t\t\t<?php echo \$this->Ajax->link2(\$this->Html->image('acciones/edit.png',array('border'=>0)),'/$pluralVar/edit/'.\${$singularVar}['{$modelClass}']['{$primaryKey}'].'/'.\$page,array('update'=>'principal','title'=>'Editar','escape'=>false),null); ?>\n";
		echo "\t\t\t<?php echo \$this->Ajax->link2(\$this->Html->image('acciones/delete.png',array('border'=>0)),'/$pluralVar/delete/'.\${$singularVar}['{$modelClass}']['{$primaryKey}'].'/'.\$page,array('update'=>'principal','title'=>'Eliminar','escape'=>false),'Está seguro que desea eliminar el registro indicado?'); ?>\n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";

	echo "<?php endforeach; ?>\n";
	?>
	</table>
	<div class="desc_paging">
	<?php echo "<?php
	echo \$this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, que muestra {:current} registros de un total de  {:count}, a partir del registro {:start}, terminando en el {:end}', true)
	));
	?>";?>
	</div>
	<div class="paging">
	<?php echo "\t<?php echo \$this->Paginator->prev('' . __('', true), array('class'=>'anterior_input'), null, array('class'=>'anterior_input_disabled'));?>\n";?>
	 | <?php echo "\t<?php echo \$this->Paginator->numbers();?>\n"?> |
	<?php echo "\t<?php echo \$this->Paginator->next(__('', true) . '', array('class'=>'siguiente_input'), null, array('class' => 'siguiente_input_disabled'));?>\n";?>
	</div>
	<?php echo "\t<?php echo \$this->Form->button('',array('class'=>'salir_input','onclick'=>\"ver_documento('/modulos/salir_programa','principal');\"));?>\n"; ?>
	<?php echo "\t<?php echo \$this->Form->button('',array('class'=>'consultar_input','onclick'=>\"ver_documento('/$pluralVar/index/','principal');\"));?>\n"; ?>
	<?php echo "\t<?php echo \$this->Form->button('',array('class'=>'regresar_input','onclick'=>\"ver_documento('/$pluralVar/add','principal');\"));?>\n"; ?>
	</fieldset>
</div>

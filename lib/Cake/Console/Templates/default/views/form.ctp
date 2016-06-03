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
<div class="<?php echo $pluralVar;?> form">
   <?php  "<?php echo \$this->Form->create('{$modelClass}');?>\n";?>
	<?php echo "<?php echo \$this->Ajax->form('{$modelClass}','post',array('model'=>'{$modelClass}','url'=>'/$pluralVar/$action','update'=>'principal_add'));?>\n";?>
	<fieldset class="fieldset_marco">
 		<legend class="titulo_marco"><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></legend>
		<div id="principal_add"></div>
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				echo "\t\techo \$this->Form->input('{$field}');\n";
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}');\n";
			}
		}
		echo "\t?>\n";
?>
        <?php echo "<?php echo \$this->Form->end(array('label'=>'', 'class'=>'guardar_input2'));?>\n"; ?>
		<?php echo "\t<?php echo \$this->Form->button('',array('class'=>'salir_input','onclick'=>\"ver_documento('/modulos/salir_programa','principal');\"));?>\n"; ?>
		<?php echo "\t<?php echo \$this->Form->button('',array('class'=>'consultar_input','onclick'=>\"ver_documento('/$pluralVar/index/page:','principal');\"));?>\n"; ?>
	</fieldset>
</div>

<?php
/**
 * Automatic generation of HTML FORMs from given data.
 *
 * Used for scaffolding.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.helpers
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Contabilidad helper library.
 *
 * Automatic generation of HTML FORMs from given data.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.view.helpers
 * @link http://book.cakephp.org/view/1383/Form
 */

App::uses('AppHelper', 'View/Helper');

class OrdenCompraHelper extends AppHelper {

var $helpers = array('Html', 'Ajax', 'Form', 'Session');

function create_buscar_proveedor() {
	echo $this->Form->input('Ordencompra.razon_social', array('label'=>false, 'readonly'=>true, 'style'=>"text-align: center;", 'size'=>20,'after'=> $this->Html->image('acciones/buscar.png',array('border'=>0, 'id'=>'buscar_ventana_proveedor')),'before'=>''));
	echo $this->Form->input('Ordencompra.proveedore_id',array('label'=>false, 'readonly'=>true, 'type'=>'hidden'));
	echo'
		<script language="JavaScript" type="text/javascript">
		  jQuery(function ($) {
			$("#buscar_ventana_proveedor").click(function (e) {
				$("#ventana_proveedor").modal({
					zIndex:1000000
				});
				  return false;
			});
		});
		</script>';
	echo ' <div id="seleccion_proveedor" style="display:none;"></div>
		<div id="ventana_proveedor" style="display:none;">
          <table cellpadding="0" cellspacing="0" class="grilla" border="0">
			<tr>
				<td width="8%">Pista:</td>
				<td width="92%">';
				      echo $this->Form->input('pista', array('label'=>false, 'readonly'=>false, 'url'=>'/ComponenteOrdenCompra/buscar_proveedor', 'update'=>'cuerpo_buscar_proveedor'));
		echo '	</td>
			</tr>
		  </table> <br>
	          <div id="cuerpo_buscar_proveedor">
					<table cellpadding="0" cellspacing="0" class="grilla" border="0">
						<tbody>
							<tr>
									<td width="20%">Ruc</td>
									<td width="35%">razon social</td>
									<td width="35%">nombre comercial</td>
									<td>Acciones</td>
							</tr>
							<tr class="altrow">
								    <td><br></td>
								    <td><br></td>
								    <td><br></td>
									<td><br></td>
							</tr>
						</tbody>
	                 </table>
	          </div>
	      </div>';
}//fin function



}//fin class
?>
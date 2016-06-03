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


App::import('model','Productosmedida');

App::uses('AppHelper', 'View/Helper');

class ProductosHelper extends AppHelper {

var $helpers = array('Html', 'Ajax', 'Form', 'Session');

function create($options = array()) {
	$this->Session->delete("Productos");
	echo $this->Ajax->form(null,'post',array('model'=>'ComponenteProducto','url'=>'/ComponenteProductos/add','update'=>'cuerpo_add'));
	echo '<br>
	<table>
			<tbody><tr>
					   <td>
							<div class="input radio">
								<div class="marco_div" id="seleccion_producto">
									<table cellpadding="0" cellspacing="0" class="grilla" border="0">
											<tr>
											    <td width="15%">Código </td>
											    <td width="15%" >M.</td>
											    <td width="45%">Descripción</td>
											    <td width="10%">Cantidad</td>
											    <td width="10%">Precio Unitario</td>
											    <td width="10%">Total</td>
											    <td>&nbsp;</td>
											</tr>
											<tr>
											    <td valign="top">';echo $this->Form->input('codigo',       array('id'=>'producto',      'label'=>false, 'readonly'=>true, 'style'=>"text-align: center;", 'size'=>5,'after'=> $this->Html->image('acciones/buscar.png',array('border'=>0, 'id'=>'buscar_ventana_producto')),'before'=>''));echo '</td>';
										   echo'<td valign="top">';echo $this->Form->input('unidad_medida',array('id'=>'unidad_medida', 'label'=>false, 'readonly'=>true, 'style'=>"text-align: center;", 'size'=>10));echo'</td>';
										   echo'<td valign="top">';echo $this->Form->input('denominacion', array('id'=>'denominacion',  'label'=>false, 'readonly'=>true, 'style'=>"text-align: left;",   'size'=>30));echo'</td>';
										   echo'<td valign="top">';
										     echo'<input type="hidden" value="" id="defa_1" />';
										     echo $this->Form->input('cantidad',        array('id'=>'cantidad',        'label'=>false, 'readonly'=>false,'style'=>"text-align: center;", 'size'=>8, 'onkeypress'=>'return numeros_con_punto(event);'));
										   echo'</td>';
										     echo'<td valign="top">';echo $this->Form->input('precio_unitario', array('id'=>'precio_unitario', 'label'=>false, 'readonly'=>false,'style'=>"text-align: center;", 'size'=>8, 'onkeypress'=>'return numeros_con_punto(event);', 'onBlur'=>"formato_decimales_3(this.id);  calcular_precio_unitario();"));echo'</td>';
	     									 echo'<td valign="top">';echo $this->Form->input('total',           array('id'=>'total',           'label'=>false, 'readonly'=>true, 'style'=>"text-align: center;", 'size'=>8, 'onkeypress'=>'return numeros_con_punto(event);'));echo'</td>';
										   echo'<td valign="top" align="center"><div class="submit"><input class="bt_plus" value="" type="submit" id="bt_plus"></div><div id="funcion"></div></td>';
										echo '</tr>
									</table>';
								echo'
										<script language="JavaScript" type="text/javascript">
										  jQuery(function ($) {
											$("#buscar_ventana_producto").click(function (e) {
												$("#ventana_producto").modal({
													zIndex:1000000
												});
												  return false;
											});
										});
										</script>
						        </div>
							</div>
					  </td>
		         </tr>
	     </tbody>
	</table>';

		echo '
		<div id="ventana_producto" style="display:none;">
          <table cellpadding="0" cellspacing="0" class="grilla" border="0">
			<tr>
				<td width="8%">Pista:</td>
				<td width="92%">';
				      echo $this->Form->input('pista', array('label'=>false, 'readonly'=>false, 'url'=>'/ComponenteProductos/buscar', 'update'=>'cuerpo_buscar'));
		echo '	</td>
			</tr>
		  </table> <br>
	          <div id="cuerpo_buscar">
					<table cellpadding="0" cellspacing="0" class="grilla" border="0">
						<tbody>
							<tr>
									<td width="15%">Código</td>
									<td width="20%">Tipo</td>
								    <td width="20%">M.</td>
								    <td width="55%">Descripción</td>
									<td>Acciones</td>
							</tr>
							<tr class="altrow">
									<td><br></td>
									<td><br></td>
								    <td><br></td>
								    <td><br></td>
									<td><br></td>
							</tr>
						</tbody>
	                 </table>
	          </div>
	      </div>
	</form>';
	echo'<div id="cuerpo_add">';
    $this->views_add();
    echo '</div>';
}//fin function
function views_add($options = array()){
	echo'
	<table cellpadding="0" cellspacing="0" class="grilla" border="0">
	<tbody>
		<tr>
				<td width="15%">Código</td>
			    <td width="20%" >M.</td>
			    <td width="35%">Descripción</td>
			    <td width="10%">Cantidad</td>
			    <td width="10%">Precio Unitario</td>
			    <td width="10%">Total</td>
				<td>Acciones</td>
		</tr>';
		$i  = 0;
		$i2 = 0;
		$total = 0;
		$Productos = $this->Session->read("Productos");
		if(isset($Productos)){
		 foreach($Productos as $Producto){
	         $Producto['id2'] = $i2;
	         $i2++;
	      if($Producto['condicion']==1){
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
					   echo"<tr $class>
								<td style='text-align:left;'> ".$Producto['codigo']."</td>
								<td style='text-align:left;'> ".$Producto['unidad_medida']."</td>
								<td style='text-align:left;'>   ".$Producto['denominacion']."</td>
								<td style='text-align:right;'> ".Formato_cantidad($Producto['cantidad'],2)."</td>
								<td style='text-align:right;'> ".Formato($Producto['precio_unitario'],2,3)."</td>
								<td style='text-align:right;'> ".Formato($Producto['cantidad']*$Producto['precio_unitario'],2,3)."</td>
								<td>";
								$total +=$Producto['cantidad']*$Producto['precio_unitario'];
	                                 echo "&nbsp;&nbsp;&nbsp;".$this->Ajax->link2($this->Html->image('acciones/delete.png',array('border'=>0)),'/ComponenteProductos/delete/'.$Producto['id2'].'/',array('update'=>'cuerpo_add','title'=>'Eliminar','escape'=>false),'Está seguro que desea eliminar el registro indicado?');
					   echo"    </td>
					   		</tr>";
	         }
	       }
	     }
	echo' <input type="hidden" id="ComponenteProductoSubTotal2" value="'.Formato($total,2).'" /> <script>calcular_total_compra();</script>
	  </tbody>
	</table>';
}



function create_req($options = array()) {
	$this->Session->delete("Productos");
	$Productosmedida  = new Productosmedida();
	$Productosmedidas = $Productosmedida->find('list',array('fields'=>array('id','denominacion')));
	echo $this->Ajax->form(null,'post',array('model'=>'ComponenteProducto','url'=>'/ComponenteProductos/add_req','update'=>'cuerpo_add'));
	echo '<br>
	<table>
			<tbody><tr>
					   <td>
							<div class="input radio">
								<div class="marco_div" id="seleccion_producto">
									<table cellpadding="0" cellspacing="0" class="grilla" border="0">
											<tr>
											    <td width="10%">Item </td>
											    <td width="45%">Descripción</td>
											    <td width="10%">Cantidad</td>
											    <td width="15%" >M.</td>
											    <td>&nbsp;</td>
											</tr>
											<tr>
											    <td valign="top"><br></td>';
										   echo'<td valign="top">';echo $this->Form->input('denominacion', array('id'=>'denominacion',  'label'=>false, 'readonly'=>false, 'style'=>"text-align: left;",   'size'=>55));echo'</td>';
										   echo'<td valign="top">';
										     echo'<input type="hidden" value="" id="defa_1" />';
										     echo $this->Form->input('cantidad',        array('id'=>'cantidad',        'label'=>false, 'readonly'=>false,'style'=>"text-align: center;", 'size'=>8, 'onkeypress'=>'return numeros_con_punto(event);'));
										   echo'</td>';
										   echo'<td valign="top">';echo $this->Form->input('unidad_medida',array('id'=>'unidad_medida', 'label'=>false, 'options'=>$Productosmedidas,'empty'=>'--Seleccione--', 'style'=>'width:100px'));echo'</td>';
										   echo'<td valign="top" align="center"><div class="submit"><input class="bt_plus" value="" type="submit" id="bt_plus"></div><div id="funcion"></div></td>';
										echo '</tr>
									</table>';
								echo'
						        </div>
							</div>
					  </td>
		         </tr>
	     </tbody>
	</table>
	</form>';
	echo'<div id="cuerpo_add">';
    $this->views_add_req();
    echo '</div>';
}//fin function
function views_add_req($options = array()){
	echo'
	<table cellpadding="0" cellspacing="0" class="grilla" border="0">
	<tbody>
		<tr>
				<td width="10%">Item</td>
			    <td width="60%">Descripción</td>
			    <td width="12%">Cantidad</td>
			    <td width="12%" >M.</td>
				<td width="5%">Acciones</td>
		</tr>';
		$i  = 0;
		$i2 = 0;
		$total = 0;
		$Productos = $this->Session->read("Productos");
		if(isset($Productos)){
		 foreach($Productos as $Producto){
	         $Producto['id2'] = $i2;
	         $i2++;
	      if($Producto['condicion']==1){
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
					   echo"<tr $class>
								<td style='text-align:left;'> ".$i2."</td>
								<td style='text-align:left;'> ".$Producto['denominacion']."</td>
								<td style='text-align:left;'>   ".Formato($Producto['cantidad'],2)."</td>
								<td style='text-align:left;'> ".$Producto['unidad_medida_deno']."</td>
								<td>";
	                                 echo "&nbsp;&nbsp;&nbsp;".$this->Ajax->link2($this->Html->image('acciones/delete.png',array('border'=>0)),'/ComponenteProductos/delete_req/'.$Producto['id2'].'/',array('update'=>'cuerpo_add','title'=>'Eliminar','escape'=>false),'Está seguro que desea eliminar el registro indicado?');
					   echo"    </td>
					   		</tr>";
	         }
	       }
	     }
	echo'
	  </tbody>
	</table>';

	echo"<script>
		 $('denominacion').value='';
		 $('cantidad').value='';
		</script>";
}
}//fin class
?>
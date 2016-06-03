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

App::import('model','Banco');
App::import('model','Moneda');
App::import('model','Rubro');

App::uses('AppHelper', 'View/Helper');

class ProveedorHelper extends AppHelper {

var $helpers = array('Html', 'Ajax', 'Form', 'Session');

function create_contato($options = array()) {
	if(!isset($options["del"])){
		$this->Session->delete("Contactos");
		$var= 1;
	}else{
		$var= 2;
	}
	echo $this->Ajax->form(null,'post',array('model'=>'ComponenteProveedor','url'=>'/ComponenteProveedor/add_contacto/'.$var,'update'=>'cuerpo_add'));
	echo '<br>
	<table>
			<tbody><tr>
					   <td>
							<div class="input radio">
								<div class="marco_div" id="seleccion_producto">
									<table cellpadding="0" cellspacing="0" class="grilla" border="0">
											<tr>
											    <td width="15%" >Nombres y Apellidos</td>
											    <td width="15%">Cargo</td>
											    <td width="10%">Cell 01</td>
											    <td width="10%">Cell 02</td>
											    <td width="10%">Email 01</td>
											    <td width="10%">Email 02</td>
											    <td>&nbsp;</td>
											</tr>
											<tr>';
										   echo'<td valign="top">';echo $this->Form->input('nombresyapellidos',array('id'=>'nombresyapellidos', 'label'=>false, 'readonly'=>false, 'style'=>"text-align: center;", 'size'=>15));echo'</td>';
										   echo'<td valign="top">';echo $this->Form->input('cargo',array('id'=>'cargo', 'label'=>false, 'readonly'=>false, 'style'=>"text-align: center;", 'size'=>15));echo'</td>';
										   echo'<td valign="top">';echo $this->Form->input('cell01',array('id'=>'cell01', 'label'=>false, 'readonly'=>false, 'style'=>"text-align: center;", 'size'=>10));echo'</td>';
										   echo'<td valign="top">';echo $this->Form->input('cell02',array('id'=>'cell02', 'label'=>false, 'readonly'=>false, 'style'=>"text-align: center;", 'size'=>10));echo'</td>';
										   echo'<td valign="top">';echo $this->Form->input('email01',array('id'=>'email01', 'label'=>false, 'readonly'=>false, 'style'=>"text-align: center;", 'size'=>10));echo'</td>';
										   echo'<td valign="top">';echo $this->Form->input('email02',array('id'=>'email02', 'label'=>false, 'readonly'=>false, 'style'=>"text-align: center;", 'size'=>10));echo'</td>';
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
	</table>
	</form>';
	echo'<div id="cuerpo_add">';
    $this->views_add_contacto($var);
    echo '</div>';
}//fin function
function views_add_contacto($options=null){
	echo'
	<table cellpadding="0" cellspacing="0" class="grilla" border="0">
	<tbody>
		<tr>
				<td width="25%" >Nombres y Apellidos</td>
			    <td width="20%">Cargo</td>
			    <td width="10%">Cell 01</td>
			    <td width="10%">Cell 02</td>
			    <td width="10%">Email 01</td>
			    <td width="10%">Email 02</td>
				<td>Acciones</td>
		</tr>';
		$i  = 0;
		$i2 = 0;
		$total = 0;
		$Contactos = $this->Session->read("Contactos");
		if(isset($Contactos)){
		 foreach($Contactos as $Contacto){
	         $Contacto['id2'] = $i2;
	         $i2++;
	      if($Contacto['condicion']==1){
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
					   echo"<tr $class>
								<td style='text-align:left;'> ".$Contacto['nombresyapellidos']."</td>
								<td style='text-align:left;'> ".$Contacto['cargo']."</td>
								<td style='text-align:left;'> ".$Contacto['cell01']."</td>
								<td style='text-align:left;'> ".$Contacto['cell02']."</td>
							    <td style='text-align:left;'> ".$Contacto['email01']."</td>
							    <td style='text-align:left;'> ".$Contacto['email02']."</td>
								<td>";
	                                 echo "&nbsp;&nbsp;&nbsp;".$this->Ajax->link2($this->Html->image('acciones/delete.png',array('border'=>0)),'/ComponenteProveedor/delete_contacto/'.$Contacto['id2'].'/'.$options,array('update'=>'cuerpo_add','title'=>'Eliminar','escape'=>false),'Está seguro que desea eliminar el registro indicado?');
					   echo"    </td>
					   		</tr>";
	         }
	       }
	     }
	echo'
	  </tbody>
	</table>';
}



function create_banco($options = array()) {

	if(!isset($options["del"])){
		$this->Session->delete("Bancos");
		$var= 1;
	}else{
		$var= 2;
	}


	$Banco  = new Banco();
	$Bancos = $Banco->find('list',array('fields'=>array('id','denominacion')));

	$Moneda  = new Moneda();
	$Monedas = $Moneda->find('list',array('fields'=>array('id','denominacion')));

	echo $this->Ajax->form(null,'post',array('model'=>'ComponenteProveedor','url'=>'/ComponenteProveedor/add_banco/'.$var,'update'=>'cuerpo_add_banco'));
	echo '<br>
	<table>
			<tbody><tr>
					   <td>
							<div class="input radio">
								<div class="marco_div" id="seleccion_producto">
									<table cellpadding="0" cellspacing="0" class="grilla" border="0">
											<tr>
											    <td width="15%" >Banco</td>
											    <td width="15%">Moneda</td>
											    <td width="30%">Cuenta</td>
											    <td>&nbsp;</td>
											</tr>
											<tr>';
										   echo'<td valign="top">';echo $this->Form->input('banco',array('id'=>'banco', 'label'=>false, 'options'=>$Bancos,'empty'=>'--Seleccione--', 'style'=>'width:250px'));echo'</td>';
										   echo'<td valign="top">';echo $this->Form->input('moneda',array('id'=>'moneda', 'label'=>false, 'options'=>$Monedas,'empty'=>'--Seleccione--', 'style'=>'width:250px'));echo'</td>';
										   echo'<td valign="top">';echo $this->Form->input('cuenta',array('id'=>'cuenta', 'label'=>false, 'readonly'=>false, 'style'=>"text-align: center;", 'size'=>20));echo'</td>';
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
	</table>
	</form>';
	echo'<div id="cuerpo_add_banco">';
    $this->views_add_banco($var=null);
    echo '</div>';
}//fin function
function views_add_banco($options=null){
	echo'
	<table cellpadding="0" cellspacing="0" class="grilla" border="0">
	<tbody>
		<tr>
				<td width="25%" >Banco</td>
			    <td width="20%">Moneda</td>
			    <td width="40%">Cuenta</td>
				<td>Acciones</td>
		</tr>';
		$i  = 0;
		$i2 = 0;
		$total = 0;
		$Bancos = $this->Session->read("Bancos");
		if(isset($Bancos)){
		 foreach($Bancos as $Banco){
	         $Banco['id2'] = $i2;
	         $i2++;
	      if($Banco['condicion']==1){
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
					   echo"<tr $class>
								<td style='text-align:left;'> ".$Banco['banco']."</td>
								<td style='text-align:left;'> ".$Banco['moneda']."</td>
								<td style='text-align:left;'> ".$Banco['cuenta']."</td>
								<td>";
	                                 echo "&nbsp;&nbsp;&nbsp;".$this->Ajax->link2($this->Html->image('acciones/delete.png',array('border'=>0)),'/ComponenteProveedor/delete_banco/'.$Banco['id2'].'/'.$options,array('update'=>'cuerpo_add_banco','title'=>'Eliminar','escape'=>false),'Está seguro que desea eliminar el registro indicado?');
					   echo"    </td>
					   		</tr>";
	         }
	       }
	     }
	echo'
	  </tbody>
	</table>';
}



function create_rubro($options = array()) {
	if(!isset($options["del"])){
		$this->Session->delete("Rubros");
		$var= 1;
	}else{
		$var= 2;
	}

	$Rubro  = new Rubro();
	$Rubros = $Rubro->find('list',array('fields'=>array('id','denominacion')));

	echo $this->Ajax->form(null,'post',array('model'=>'ComponenteProveedor','url'=>'/ComponenteProveedor/add_rubro/'.$var,'update'=>'cuerpo_add_rubro'));
	echo '<br>
	<table>
			<tbody><tr>
					   <td>
							<div class="input radio">
								<div class="marco_div" id="seleccion_rubro">
									<table cellpadding="0" cellspacing="0" class="grilla" border="0">
											<tr>
											    <td width="90%" >Rubro</td>
											    <td>&nbsp;</td>
											</tr>
											<tr>';
//										   echo'<td valign="top">';echo $this->Form->input('rubro',array('id'=>'rubro', 'label'=>false, 'options'=>$Rubros,'empty'=>'--Seleccione--', 'style'=>'width:250px'));echo'</td>';
										   echo'<td valign="top">';echo $this->Form->input('denorubro',array('id'=>'denorubro', 'label'=>false, 'readonly'=>true, 'style'=>"text-align: center;", 'size'=>20,'after'=> $this->Html->image('acciones/buscar.png',array('border'=>0, 'id'=>'buscar_ventana_rubro')),'before'=>''));echo '</td>';
										   echo'<input type="hidden" name="data[ComponenteProveedor][rubro]" value="" id="rubro" />';
										   echo'<td valign="top" align="center"><div class="submit"><input class="bt_plus" value="" type="submit" id="bt_plus"></div><div id="funcion"></div></td>';
										echo '</tr>
									</table>';
								echo'
										<script language="JavaScript" type="text/javascript">
										  jQuery(function ($) {
											$("#buscar_ventana_rubro").click(function (e) {
												$("#ventana_rubro").modal({
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
	</table>
	</form>';
	echo '
		<div id="ventana_rubro" style="display:none;">
          <table cellpadding="0" cellspacing="0" class="grilla" border="0">
			<tr>
				<td width="8%">Pista:</td>
				<td width="92%">';
				      echo $this->Form->input('pista', array('label'=>false, 'readonly'=>false, 'url'=>'/ComponenteProveedor/buscar_rubro', 'update'=>'cuerpo_buscar_rubro'));
		echo '	</td>
			</tr>
		  </table> <br>
	          <div id="cuerpo_buscar_rubro">
					<table cellpadding="0" cellspacing="0" class="grilla" border="0">
						<tbody>
							<tr>
									<td width="90%">Rubro</td>
									<td>Acciones</td>
							</tr>
							<tr class="altrow">
								    <td><br></td>
									<td><br></td>
							</tr>
						</tbody>
	                 </table>
	          </div>
	      </div>
	</form>';
	echo'<div id="cuerpo_add_rubro">';
    $this->views_add_rubro($var);
    echo '</div>';
}//fin function
function views_add_rubro($options=null){
	echo'
	<table cellpadding="0" cellspacing="0" class="grilla" border="0">
	<tbody>
		<tr>
				<td width="90%" >Rubro</td>
				<td>Acciones</td>
		</tr>';
		$i  = 0;
		$i2 = 0;
		$total = 0;
		$Rubros = $this->Session->read("Rubros");
		if(isset($Rubros)){
		 foreach($Rubros as $Rubro){
	         $Rubro['id2'] = $i2;
	         $i2++;
	      if($Rubro['condicion']==1){
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
					   echo"<tr $class>
								<td style='text-align:left;'> ".$Rubro['rubro']."</td>
								<td>";
	                                 echo "&nbsp;&nbsp;&nbsp;".$this->Ajax->link2($this->Html->image('acciones/delete.png',array('border'=>0)),'/ComponenteProveedor/delete_rubro/'.$Rubro['id2'].'/'.$options,array('update'=>'cuerpo_add_rubro','title'=>'Eliminar','escape'=>false),'Está seguro que desea eliminar el registro indicado?');
					   echo"    </td>
					   		</tr>";
	         }
	       }
	     }
	echo'
	  </tbody>
	</table>';
}



}//fin class
?>
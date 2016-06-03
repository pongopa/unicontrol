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
App::import('model','ConfPai');
App::import('model','ConfDepartamento');
App::import('model','ConfProvincia');
App::import('model','ConfDistrito');

App::uses('AppHelper', 'View/Helper');

class ClienteHelper extends AppHelper {

var $helpers = array('Html', 'Ajax', 'Form', 'Session');


function create_contato($options = array()) {
	if(!isset($options["del"])){
		$this->Session->delete("Contactos");
		$var= 1;
	}else{
		$var= 2;
	}
	echo $this->Ajax->form(null,'post',array('model'=>'ComponenteCliente','url'=>'/ComponenteCliente/add_contacto/'.$var,'update'=>'cuerpo_add'));
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
	                                 echo "&nbsp;&nbsp;&nbsp;".$this->Ajax->link2($this->Html->image('acciones/delete.png',array('border'=>0)),'/ComponenteCliente/delete_contacto/'.$Contacto['id2'].'/'.$options,array('update'=>'cuerpo_add','title'=>'Eliminar','escape'=>false),'Está seguro que desea eliminar el registro indicado?');
					   echo"    </td>
					   		</tr>";
	         }
	       }
	     }
	echo'
	  </tbody>
	</table>';
}





function create_direccion($options = array()) {
	if(!isset($options["del"])){
		$this->Session->delete("Direcciones");
		$var= 1;
	}else{
		$var= 2;
	}

	$ConfPai  = new ConfPai();
	$ConfPais = $ConfPai->find('list',array('fields'=>array('id','denominacion')));


	echo $this->Ajax->form(null,'post',array('model'=>'ComponenteCliente','url'=>'/ComponenteCliente/add_direccion/'.$var,'update'=>'cuerpo_add_direccion'));
	echo '<br>
	<table>
			<tbody><tr>
					   <td>
							<div class="input radio">
								<div class="marco_div" id="seleccion_producto">
									<table cellpadding="0" cellspacing="0" class="grilla" border="0">
											<tr>
											    <td width="15%" >Dirección</td>
											    <td width="15%">Referencia</td>
											    <td width="15%">Pais</td>
											    <td width="15%">Departamento</td>
											    <td width="15%">Provincia</td>
											    <td width="15%">Distrito</td>
											    <td>&nbsp;</td>
											</tr>
											<tr>';
										   echo'<td valign="top">';echo $this->Form->input('direccion',  array('id'=>'nombresyapellidos', 'label'=>false, 'readonly'=>false, 'style'=>"text-align: center;", 'size'=>15));echo'</td>';
										   echo'<td valign="top">';echo $this->Form->input('referencia', array('id'=>'cargo', 'label'=>false, 'readonly'=>false, 'style'=>"text-align: center;", 'size'=>15));echo'</td>';
                                           echo'<td valign="top">';echo $this->Form->input('conf_pai_id',array('id'=>'conf_pai_id', 'label'=>false, 'options'=>$ConfPais,'empty'=>'--Seleccione--', 'style'=>'width:100px','onchange'=>"input_remoto('/ComponenteCliente/select/1','select_departamento',this.value);"));echo'</td>';
                                           echo'<td id="select_departamento">'; echo $this->Form->input('ComponenteCliente.conf_departamento_id',array('label'=>false, 'style'=>'width:100px')); echo'</td>';
									       echo'<td id="select_provincia">';    echo $this->Form->input('ComponenteCliente.conf_provincia_id',array('label'=>false, 'style'=>'width:100px'));    echo'</td>';
									       echo'<td id="select_distrito">';     echo $this->Form->input('ComponenteCliente.conf_distrito_id',array('label'=>false, 'style'=>'width:100px'));     echo'</td>';



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
	echo'<div id="cuerpo_add_direccion">';
    $this->views_add_direccion($var);
    echo '</div>';
}//fin function
function views_add_direccion($options=null){
	echo'
	<table cellpadding="0" cellspacing="0" class="grilla" border="0">
	<tbody>
		<tr>
				<td width="25%" >Dirección</td>
			    <td width="20%">Referencia</td>
			    <td width="20%">Pais</td>
			    <td width="20%">Departamento</td>
			    <td width="20%">Provincia</td>
			    <td width="20%">Distrito</td>
				<td>Acciones</td>
		</tr>';
		$i  = 0;
		$i2 = 0;
		$total = 0;
		$Direcciones = $this->Session->read("Direcciones");
		if(isset($Direcciones)){
		 foreach($Direcciones as $Direccion){
	         $Direccion['id2'] = $i2;
	         $i2++;
	      if($Direccion['condicion']==1){
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
					   echo"<tr $class>
								<td style='text-align:left;'> ".$Direccion['direccion']."</td>
								<td style='text-align:left;'> ".$Direccion['referencia']."</td>
								<td style='text-align:left;'> ".$Direccion['pai_deno']."</td>
								<td style='text-align:left;'> ".$Direccion['dep_deno']."</td>
								<td style='text-align:left;'> ".$Direccion['pro_deno']."</td>
								<td style='text-align:left;'> ".$Direccion['dis_deno']."</td>
								<td>";
	                                 echo "&nbsp;&nbsp;&nbsp;".$this->Ajax->link2($this->Html->image('acciones/delete.png',array('border'=>0)),'/ComponenteCliente/delete_direccion/'.$Direccion['id2'].'/'.$options,array('update'=>'cuerpo_add_direccion','title'=>'Eliminar','escape'=>false),'Está seguro que desea eliminar el registro indicado?');
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
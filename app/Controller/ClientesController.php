<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 */
class ClientesController extends AppController {
	var $paginate = array('limit'=>50);
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html', 'Cliente');

/**
 * beforeFilter method
 *
 * @return void
 */
    public function beforeFilter(){
		$this->checkSession();
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout='ajax';
		$this->Cliente->recursive = 0;
		$this->set('clientes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->Cliente->recursive = 3;
		$this->set('cliente', $this->Cliente->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Cliente->create();
			$this->Cliente->begin();
			$this->request->data['Cliente']['add_usuario_id']=$this->Session->read('USUARIO_ID');
			if(!empty($this->request->data['Cliente']['fecha_de_inscripcion'])){
				$this->request->data['Cliente']['fecha_de_inscripcion'] = cambiar_formato_fecha($this->request->data['Cliente']['fecha_de_inscripcion']);
			}
			if ($this->Cliente->save($this->request->data)) {
								$contar    = 0;
							    $inicio    = 0;
							    $i2        = 0;
				                $Contactos = $this->Session->read("Contactos");
								$id_clie   = $this->Cliente->id;
								if(isset($Contactos)){
									 foreach($Contactos as $Contacto){
									 	  $Contacto['id2'] = $i2;
					                      $i2++;
									      if($Contacto['condicion']==1){
								      	       $this->request->data['Clientesvendedore']['cliente_id']           = $id_clie;
								      	       $this->request->data['Clientesvendedore']['nombres_y_apellidos']  = $Contacto["nombresyapellidos"];
											   $this->request->data['Clientesvendedore']['cargo']                = $Contacto["cargo"];
											   $this->request->data['Clientesvendedore']['cell_1']               = $Contacto["cell01"];
											   $this->request->data['Clientesvendedore']['cell_2']               = $Contacto["cell02"];
											   $this->request->data['Clientesvendedore']['email_1']              = $Contacto["email01"];
											   $this->request->data['Clientesvendedore']['email_2']              = $Contacto["email02"];
											   $this->Cliente->Clientesvendedore->create();
											   if ($this->Cliente->Clientesvendedore->save($this->request->data)) {
													$inicio++;
												} else {
													$contar++;
												}
				                          }//fin if
									  }//fin foreach
								}//fin if
								if($contar==0 && $inicio==0){$inicio=1;}
								if($contar==0 && $inicio!=0) {
                                            $contar      = 0;
										    $inicio      = 0;
										    $i2          = 0;
							                $Direcciones = $this->Session->read("Direcciones");
											$id_clie     = $this->Cliente->id;
											if(isset($Direcciones)){
												 foreach($Direcciones as $Direccion){
												 	  $Direccion['id2'] = $i2;
								                      $i2++;
												      if($Direccion['condicion']==1){
											      	       $this->request->data['Clientesucursa']['cliente_id']       = $id_clie;
											      	       $this->request->data['Clientesucursa']['direccion']        = $Direccion["direccion"];
														   $this->request->data['Clientesucursa']['referencia']       = $Direccion["referencia"];
														   $this->request->data['Clientesucursa']['conf_pai_id']            = $Direccion["conf_pai_id"];
														   $this->request->data['Clientesucursa']['conf_departamento_id']   = $Direccion["conf_departamento_id"];
														   $this->request->data['Clientesucursa']['conf_provincia_id']      = $Direccion["conf_provincia_id"];
														   $this->request->data['Clientesucursa']['conf_distrito_id']       = $Direccion["conf_distrito_id"];
														   $this->Cliente->Clientesucursa->create();
														   if ($this->Cliente->Clientesucursa->save($this->request->data)) {
																$inicio++;
															} else {
																$contar++;
															}
							                          }//fin if
												  }//fin foreach
											}//fin if
											if($contar==0 && $inicio==0){$inicio=1;}
											if($contar==0 && $inicio!=0) {
												$this->Cliente->commit();
												msj('Registro Guardado Exitosamente','exito');
												$this->set('URL',"/".$this->name."/add");
									            $this->render('redirect');
									        } else {
												$this->Cliente->rollback();
												msj('Registro No Guardado','error');
												$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Cliente),$this->Cliente->validate));
										        $this->render('error');
											}
						        } else {
									$this->Cliente->rollback();
									msj('Registro No Guardado','error');
									$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Cliente),$this->Cliente->validate));
							        $this->render('error');
								}
			} else {
				$this->Cliente->rollback();
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Cliente),$this->Cliente->validate));
		        $this->render('error');
			}
		}
		$condicionpagos = $this->Cliente->Condicionpago->find('list');
		$estadocontribuyentes = $this->Cliente->Estadocontribuyente->find('list');
		$this->set(compact('condicionpagos', 'estadocontribuyentes'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
            $this->Cliente->begin();
			$this->request->data['Cliente']['mod_usuario_id']=$this->Session->read('USUARIO_ID');
			if(!empty($this->request->data['Cliente']['fecha_de_inscripcion'])){
				$this->request->data['Cliente']['fecha_de_inscripcion'] = cambiar_formato_fecha($this->request->data['Cliente']['fecha_de_inscripcion']);
			}
			if ($this->Cliente->save($this->request->data)) {
								$contar    = 0;
							    $inicio    = 0;
							    $i2        = 0;
				                $Contactos = $this->Session->read("Contactos");
								$id_clie   = $this->Cliente->id;
								if(isset($Contactos)){
									 foreach($Contactos as $Contacto){
									 	  $Contacto['id2'] = $i2;
					                      $i2++;
					                      $this->request->data['Clientesvendedore']['id'] = null;
									      if($Contacto['condicion']==1){
									      	   if($Contacto["idContacto"]!="n/a"){
									      	   	$this->request->data['Clientesvendedore']['id']                  = $Contacto["idContacto"];
									      	   }
								      	       $this->request->data['Clientesvendedore']['cliente_id']           = $id_clie;
								      	       $this->request->data['Clientesvendedore']['nombres_y_apellidos']  = $Contacto["nombresyapellidos"];
											   $this->request->data['Clientesvendedore']['cargo']                = $Contacto["cargo"];
											   $this->request->data['Clientesvendedore']['cell_1']               = $Contacto["cell01"];
											   $this->request->data['Clientesvendedore']['cell_2']               = $Contacto["cell02"];
											   $this->request->data['Clientesvendedore']['email_1']              = $Contacto["email01"];
											   $this->request->data['Clientesvendedore']['email_2']              = $Contacto["email02"];
//											   $this->Cliente->Clientesvendedore->create();
											   if ($this->Cliente->Clientesvendedore->save($this->request->data)) {
													$inicio++;
												} else {
													$contar++;
												}
				                          }else{
                                                 if($Contacto["idContacto"]!="n/a"){
                                                 	$this->Cliente->Clientesvendedore->delete($Contacto["idContacto"]);
                                                 }
				                          }
									  }//fin foreach
								}//fin if
								if($contar==0 && $inicio==0){$inicio=1;}
								if($contar==0 && $inicio!=0) {
											$contar      = 0;
										    $inicio      = 0;
										    $i2          = 0;
							                $Direcciones = $this->Session->read("Direcciones");
											$id_clie     = $this->Cliente->id;
											if(isset($Direcciones)){
												 foreach($Direcciones as $Direccion){
												 	  $Direccion['id2'] = $i2;
								                      $i2++;
								                      $this->request->data['Clientesucursa']['id'] = null;
												      if($Direccion['condicion']==1){
												      	   if($Direccion["idDireccion"]!="n/a"){
												      	   		$this->request->data['Clientesucursa']['id']          = $Direccion["idDireccion"];
												      	   }
											      	       $this->request->data['Clientesucursa']['cliente_id']       = $id_clie;
											      	       $this->request->data['Clientesucursa']['direccion']        = $Direccion["direccion"];
														   $this->request->data['Clientesucursa']['referencia']       = $Direccion["referencia"];
														   $this->request->data['Clientesucursa']['conf_pai_id']            = $Direccion["conf_pai_id"];
														   $this->request->data['Clientesucursa']['conf_departamento_id']   = $Direccion["conf_departamento_id"];
														   $this->request->data['Clientesucursa']['conf_provincia_id']      = $Direccion["conf_provincia_id"];
														   $this->request->data['Clientesucursa']['conf_distrito_id']       = $Direccion["conf_distrito_id"];
//														   $this->Cliente->Clientesvendedore->create();
														   if ($this->Cliente->Clientesucursa->save($this->request->data)) {
																$inicio++;
															} else {
																$contar++;
															}
							                          }else{
	                                                         if($Direccion["idDireccion"]!="n/a"){
	                                                         	$this->Cliente->Clientesucursa->delete($Direccion["idDireccion"]);
	                                                         }
							                          }
												  }//fin foreach
											}//fin if
											if($contar==0 && $inicio==0){$inicio=1;}
											if($contar==0 && $inicio!=0) {
												$this->Cliente->commit();
												msj('Registro Guardado Exitosamente','exito');
												$this->set('URL',"/".$this->name."/");
									            $this->render('redirect');
								            } else {
									        	$this->Cliente->rollback();
												msj('Registro No Guardado','error');
												$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Cliente),$this->Cliente->validate));
										        $this->render('error');
											}
						        } else {
						        	$this->Cliente->rollback();
									msj('Registro No Guardado','error');
									$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Cliente),$this->Cliente->validate));
							        $this->render('error');
								}
			} else {
				$this->Cliente->rollback();
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Cliente),$this->Cliente->validate));
		        $this->render('error');
			}



		} else {
			$this->Cliente->recursive = 3;
			$this->request->data = $this->Cliente->read(null, $id);
			$this->Session->delete("Contactos");
            $Contactos  = $this->Session->read("Contactos");
			foreach ($this->request->data["Clientesvendedore"] as $clientesvendedore):
						$Contacto["id"]                    = 0;
						$Contacto["idContacto"]            = $clientesvendedore['id'];
						$Contacto["cliente_id"]            = $clientesvendedore['cliente_id'];
	    	         	$Contacto["nombresyapellidos"]     = $clientesvendedore['nombres_y_apellidos'];
	    	         	$Contacto["cargo"]                 = $clientesvendedore['cargo'];
	    	         	$Contacto["cell01"]                = $clientesvendedore['cell_1'];
	    	         	$Contacto["cell02"]                = $clientesvendedore['cell_2'];
	    	         	$Contacto["email01"]               = $clientesvendedore['email_1'];
	    	         	$Contacto["email02"]               = $clientesvendedore['email_2'];
	                    $Contacto["condicion"]             = 1;
	                    $Contacto["inicio"]                = 2;
	                    $Contactos[] = $Contacto;
			endforeach;
			$this->Session->write("Contactos",$Contactos);

			$this->Session->delete("Direcciones");
            $Direcciones  = $this->Session->read("Direcciones");
			foreach ($this->request->data["Clientesucursa"] as $clientesucursa):
						$Direccion["id"]                    = 0;
						$Direccion["idDireccion"]           = $clientesucursa['id'];
						$Direccion["cliente_id"]            = $clientesucursa['cliente_id'];
						$Direccion["direccion"]             = $clientesucursa['direccion'];
						$Direccion["referencia"]            = $clientesucursa['referencia'];
						$Direccion["conf_pai_id"]           = $clientesucursa['conf_pai_id'];
        	         	$Direccion["conf_departamento_id"]  = $clientesucursa['conf_departamento_id'];
        	         	$Direccion["conf_provincia_id"]     = $clientesucursa['conf_provincia_id'];
        	         	$Direccion["conf_distrito_id"]      = $clientesucursa['conf_distrito_id'];
                        $Direccion["pai_deno"]              = $clientesucursa["ConfPai"]["denominacion"];
                        $Direccion["dep_deno"]              = $clientesucursa["ConfDepartamento"]["denominacion"];
                        $Direccion["pro_deno"]              = $clientesucursa["ConfProvincia"]["denominacion"];
                        $Direccion["dis_deno"]              = $clientesucursa["ConfDistrito"]["denominacion"];
	                    $Direccion["condicion"]             = 1;
	                    $Direccion["inicio"]                = 2;
	                    $Direcciones[] = $Direccion;
			endforeach;
			$this->Session->write("Direcciones",$Direcciones);
		}
		$condicionpagos = $this->Cliente->Condicionpago->find('list');
		$estadocontribuyentes = $this->Cliente->Estadocontribuyente->find('list');
		$this->set(compact('condicionpagos', 'estadocontribuyentes'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->layout='ajax';
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Cliente->delete()) {
//			$this->Session->setFlash(__('Cliente deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Cliente was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

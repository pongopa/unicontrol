<?php
App::uses('AppController', 'Controller');
/**
 * Proveedores Controller
 *
 * @property Proveedore $Proveedore
 */
class ProveedoresController extends AppController {
	var $paginate = array('limit'=>50);
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html', 'Proveedor');

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
		$this->Proveedore->recursive = 0;
		$this->set('proveedores', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Proveedore->id = $id;
		if (!$this->Proveedore->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->Proveedore->recursive = 3;
		$this->set('proveedore', $this->Proveedore->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Proveedore->create();
			$this->Proveedore->begin();
			$this->request->data['Proveedore']['add_usuario_id']=$this->Session->read('USUARIO_ID');
			if(!empty($this->request->data['Proveedore']['fecha_de_inscripcion'])){
				$this->request->data['Proveedore']['fecha_de_inscripcion'] = cambiar_formato_fecha($this->request->data['Proveedore']['fecha_de_inscripcion']);
			}
			if ($this->Proveedore->save($this->request->data)) {
								$contar    = 0;
							    $inicio    = 0;
							    $i2        = 0;
				                $Contactos = $this->Session->read("Contactos");
								$id_provee = $this->Proveedore->id;
								if(isset($Contactos)){
									 foreach($Contactos as $Contacto){
									 	  $Contacto['id2'] = $i2;
					                      $i2++;
									      if($Contacto['condicion']==1){
								      	       $this->request->data['Proveedoresvendedore']['proveedore_id']        = $id_provee;
								      	       $this->request->data['Proveedoresvendedore']['nombres_y_apellidos']  = $Contacto["nombresyapellidos"];
											   $this->request->data['Proveedoresvendedore']['cargo']                = $Contacto["cargo"];
											   $this->request->data['Proveedoresvendedore']['cell_1']               = $Contacto["cell01"];
											   $this->request->data['Proveedoresvendedore']['cell_2']               = $Contacto["cell02"];
											   $this->request->data['Proveedoresvendedore']['email_1']              = $Contacto["email01"];
											   $this->request->data['Proveedoresvendedore']['email_2']              = $Contacto["email02"];
											   $this->Proveedore->Proveedoresvendedore->create();
											   if ($this->Proveedore->Proveedoresvendedore->save($this->request->data)) {
													$inicio++;
												} else {
													$contar++;
												}
				                          }//fin if
									  }//fin foreach
								}//fin if
								if($contar==0 && $inicio==0){$inicio=1;}
								if($contar==0 && $inicio!=0) {
                                        $contar    = 0;
									    $inicio    = 0;
									    $i2        = 0;
						                $Bancos    = $this->Session->read("Bancos");
										$id_provee = $this->Proveedore->id;
										if(isset($Bancos)){
											 foreach($Bancos as $Banco){
											 	  $Banco['id2'] = $i2;
							                      $i2++;
											      if($Banco['condicion']==1){
										      	       $this->request->data['Proveedoresbanco']['proveedore_id']    = $id_provee;
										      	       $this->request->data['Proveedoresbanco']['banco_id']         = $Banco["banco_id"];
													   $this->request->data['Proveedoresbanco']['moneda_id']        = $Banco["moneda_id"];
													   $this->request->data['Proveedoresbanco']['cuenta_bancaria']  = $Banco["cuenta"];
													   $this->Proveedore->Proveedoresbanco->create();
													   if ($this->Proveedore->Proveedoresbanco->save($this->request->data)) {
															$inicio++;
														} else {
															$contar++;
														}
						                          }//fin if
											  }//fin foreach
										}//fin if
										if($contar==0 && $inicio==0){$inicio=1;}
										if($contar==0 && $inicio!=0) {
		                                        $contar    = 0;
											    $inicio    = 0;
											    $i2        = 0;
								                $Rubros    = $this->Session->read("Rubros");
												$id_provee = $this->Proveedore->id;
												if(isset($Rubros)){
													 foreach($Rubros as $Rubro){
													 	  $Rubro['id2'] = $i2;
									                      $i2++;
													      if($Rubro['condicion']==1){
												      	       $this->request->data['Proveedoresrubro']['proveedore_id'] = $id_provee;
												      	       $this->request->data['Proveedoresrubro']['rubro_id']      = $Rubro["rubro_id"];
															   $this->Proveedore->Proveedoresrubro->create();
															   if ($this->Proveedore->Proveedoresrubro->save($this->request->data)) {
																	$inicio++;
																} else {
																	$contar++;
																}
								                          }//fin if
													  }//fin foreach
												}//fin if
												if($contar==0 && $inicio==0){$inicio=1;}
												if($contar==0 && $inicio!=0) {
													    $this->Proveedore->commit();
														msj('Registro Guardado Exitosamente','exito');
														$this->set('URL',"/".$this->name."/add");
											            $this->render('redirect');
											    }else{
											            $this->Proveedore->rollback();
														msj('Registro No Guardado','error');
														$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedore),$this->Proveedore->validate));
												        $this->render('error');
												}//fin else
										}else{
									            $this->Proveedore->rollback();
												msj('Registro No Guardado','error');
												$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedore),$this->Proveedore->validate));
										        $this->render('error');
										}//fin else
								}else{
							            $this->Proveedore->rollback();
										msj('Registro No Guardado','error');
										$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedore),$this->Proveedore->validate));
								        $this->render('error');
								}//fin else
			} else {
				$this->Proveedore->rollback();
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedore),$this->Proveedore->validate));
		        $this->render('error');
			}//fin else
		}//fin if (!empty($this->request->data)){
		$condicionpagos = $this->Proveedore->Condicionpago->find('list');
		$estadocontribuyentes = $this->Proveedore->Estadocontribuyente->find('list');
		$confPais = $this->Proveedore->ConfPai->find('list');
		$this->set(compact('condicionpagos', 'estadocontribuyentes','confPais'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Proveedore->id = $id;
		if (!$this->Proveedore->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			$this->Proveedore->begin();
			$this->request->data['Proveedore']['mod_usuario_id']=$this->Session->read('USUARIO_ID');
			if(!empty($this->request->data['Proveedore']['fecha_de_inscripcion'])){
				$this->request->data['Proveedore']['fecha_de_inscripcion'] = cambiar_formato_fecha($this->request->data['Proveedore']['fecha_de_inscripcion']);
			}
			if ($this->Proveedore->save($this->request->data)) {
                                $contar    = 0;
							    $inicio    = 0;
							    $i2        = 0;
				                $Contactos = $this->Session->read("Contactos");
								$id_provee = $this->Proveedore->id;
								if(isset($Contactos)){
									 foreach($Contactos as $Contacto){
									 	  $Contacto['id2'] = $i2;
					                      $i2++;
					                      $this->request->data['Proveedoresvendedore']['id'] = null;
									      if($Contacto['condicion']==1){
									      	   if($Contacto["idContacto"]!="n/a"){
									      	   	$this->request->data['Proveedoresvendedore']['id']                   = $Contacto["idContacto"];
									      	   }
								      	       $this->request->data['Proveedoresvendedore']['proveedore_id']        = $id_provee;
								      	       $this->request->data['Proveedoresvendedore']['nombres_y_apellidos']  = $Contacto["nombresyapellidos"];
											   $this->request->data['Proveedoresvendedore']['cargo']                = $Contacto["cargo"];
											   $this->request->data['Proveedoresvendedore']['cell_1']               = $Contacto["cell01"];
											   $this->request->data['Proveedoresvendedore']['cell_2']               = $Contacto["cell02"];
											   $this->request->data['Proveedoresvendedore']['email_1']              = $Contacto["email01"];
											   $this->request->data['Proveedoresvendedore']['email_2']              = $Contacto["email02"];
//											   $this->Proveedore->Proveedoresvendedore->create();
											   if ($this->Proveedore->Proveedoresvendedore->save($this->request->data)) {
													$inicio++;
												} else {
													$contar++;
												}
				                          }else{
                                                 if($Contacto["idContacto"]!="n/a"){
                                                 	$this->Proveedore->Proveedoresvendedore->delete($Contacto["idContacto"]);
                                                 }
				                          }
									  }//fin foreach
								}//fin if
								if($contar==0 && $inicio==0){$inicio=1;}
								if($contar==0 && $inicio!=0) {
                                        $contar    = 0;
									    $inicio    = 0;
									    $i2        = 0;
						                $Bancos    = $this->Session->read("Bancos");
										$id_provee = $this->Proveedore->id;
										if(isset($Bancos)){
											 foreach($Bancos as $Banco){
											 	  $Banco['id2'] = $i2;
							                      $i2++;
							                      $this->request->data['Proveedoresbanco']['id'] = null;
											      if($Banco['condicion']==1){
												      	if($Banco["idBanco"]!="n/a"){
											      	       $this->request->data['Proveedoresbanco']['id']               = $Banco["idBanco"];
												      	}
										      	       $this->request->data['Proveedoresbanco']['proveedore_id']    = $id_provee;
										      	       $this->request->data['Proveedoresbanco']['banco_id']         = $Banco["banco_id"];
													   $this->request->data['Proveedoresbanco']['moneda_id']        = $Banco["moneda_id"];
													   $this->request->data['Proveedoresbanco']['cuenta_bancaria']  = $Banco["cuenta"];
//													   $this->Proveedore->Proveedoresbanco->create();
													   if ($this->Proveedore->Proveedoresbanco->save($this->request->data)) {
															$inicio++;
														} else {
															$contar++;
														}
						                          }else{
                                                         if($Banco["idBanco"]!="n/a"){
                                                         	$this->Proveedore->Proveedoresbanco->delete($Banco["idBanco"]);
                                                         }
						                          }
											  }//fin foreach
										}//fin if
										if($contar==0 && $inicio==0){$inicio=1;}
										if($contar==0 && $inicio!=0) {
		                                        $contar    = 0;
											    $inicio    = 0;
											    $i2        = 0;
								                $Rubros    = $this->Session->read("Rubros");
												$id_provee = $this->Proveedore->id;
												if(isset($Rubros)){
													 foreach($Rubros as $Rubro){
													 	  $Rubro['id2'] = $i2;
									                      $i2++;
									                      $this->request->data['Proveedoresrubro']['id']=null;
													      if($Rubro['condicion']==1){
													      	   if($Rubro["idRubro"]!="n/a"){
													      	   	$this->request->data['Proveedoresrubro']['id']            = $Rubro["idRubro"];
													      	   }
												      	       $this->request->data['Proveedoresrubro']['proveedore_id'] = $id_provee;
												      	       $this->request->data['Proveedoresrubro']['rubro_id']      = $Rubro["rubro_id"];
//															   $this->Proveedore->Proveedoresrubro->create();
															   if ($this->Proveedore->Proveedoresrubro->save($this->request->data)) {
																	$inicio++;
																} else {
																	$contar++;
																}
								                          }else{
                                                                 if($Rubro["idRubro"]!="n/a"){
                                                                 	$this->Proveedore->Proveedoresrubro->delete($Rubro["idRubro"]);
                                                                 }
								                          }
													  }//fin foreach
												}//fin if
												if($contar==0 && $inicio==0){$inicio=1;}
												if($contar==0 && $inicio!=0) {
													    $this->Proveedore->commit();
														msj('Registro Guardado Exitosamente','exito');
														$this->set('URL',"/".$this->name."/");
											            $this->render('redirect');
											    }else{
											            $this->Proveedore->rollback();
														msj('Registro No Guardado','error');
														$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedore),$this->Proveedore->validate));
												        $this->render('error');
												}//fin else
										}else{
									            $this->Proveedore->rollback();
												msj('Registro No Guardado','error');
												$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedore),$this->Proveedore->validate));
										        $this->render('error');
										}//fin else
								}else{
							            $this->Proveedore->rollback();
										msj('Registro No Guardado','error');
										$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedore),$this->Proveedore->validate));
								        $this->render('error');
								}//fin else
								/**/
			} else {
				$this->Proveedore->rollback();
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedore),$this->Proveedore->validate));
		        $this->render('error');
			}
		} else {
			$this->Proveedore->recursive = 3;
			$this->request->data = $this->Proveedore->read(null, $id);
			$this->Session->delete("Contactos");
            $Contactos  = $this->Session->read("Contactos");
			foreach ($this->request->data["Proveedoresvendedore"] as $proveedoresvendedore):
						$Contacto["id"]                    = 0;
						$Contacto["idContacto"]            = $proveedoresvendedore['id'];
						$Contacto["proveedore_id"]         = $proveedoresvendedore['proveedore_id'];
	    	         	$Contacto["nombresyapellidos"]     = $proveedoresvendedore['nombres_y_apellidos'];
	    	         	$Contacto["cargo"]                 = $proveedoresvendedore['cargo'];
	    	         	$Contacto["cell01"]                = $proveedoresvendedore['cell_1'];
	    	         	$Contacto["cell02"]                = $proveedoresvendedore['cell_2'];
	    	         	$Contacto["email01"]               = $proveedoresvendedore['email_1'];
	    	         	$Contacto["email02"]               = $proveedoresvendedore['email_2'];
	                    $Contacto["condicion"]             = 1;
	                    $Contacto["inicio"]                = 2;
	                    $Contactos[] = $Contacto;
			endforeach;
			$this->Session->write("Contactos",$Contactos);

            $this->Session->delete("Bancos");
			$Bancos  = $this->Session->read("Bancos");
			foreach ($this->request->data["Proveedoresbanco"] as $proveedoresbanco):
						$Banco["id"]                    = 0;
						$Banco["idBanco"]               = $proveedoresbanco['id'];
						$Banco["proveedore_id"]         = $proveedoresbanco['proveedore_id'];
	    	         	$Banco["banco"]                 = $proveedoresbanco["Banco"]["denominacion"];
        	         	$Banco["moneda"]                = $proveedoresbanco["Moneda"]["denominacion"];
        	         	$Banco["banco_id"]              = $proveedoresbanco["Banco"]["id"];
        	         	$Banco["moneda_id"]             = $proveedoresbanco["Moneda"]["id"];
        	         	$Banco["cuenta"]                = $proveedoresbanco["cuenta_bancaria"];
	                    $Banco["condicion"]             = 1;
	                    $Banco["inicio"]                = 2;
	                    $Bancos[] = $Banco;
			endforeach;
			$this->Session->write("Bancos",$Bancos);

			$this->Session->delete("Rubros");
			$Rubros  = $this->Session->read("Rubros");
			foreach ($this->request->data["Proveedoresrubro"] as $proveedoresrubro):
						$Rubro["id"]                    = 0;
						$Rubro["idRubro"]               = $proveedoresrubro['id'];
						$Rubro["proveedore_id"]         = $proveedoresrubro['proveedore_id'];
	    	         	$Rubro["rubro"]                 = $proveedoresrubro["Rubro"]["denominacion"];
        	         	$Rubro["rubro_id"]              = $proveedoresrubro["rubro_id"];
	                    $Rubro["condicion"]             = 1;
	                    $Rubro["inicio"]                = 2;
	                    $Rubros[] = $Rubro;
			endforeach;
			$this->Session->write("Rubros",$Rubros);

			/**/
		}
		$condicionpagos = $this->Proveedore->Condicionpago->find('list');
		$estadocontribuyentes = $this->Proveedore->Estadocontribuyente->find('list');
		$confPais = $this->Proveedore->ConfPai->find('list');
		$confDepartamentos = $this->Proveedore->ConfDepartamento->find('list',array('conditions'=>array('conf_pai_id'=>$this->request->data["Proveedore"]["conf_pai_id"]),'fields'=>array('id','denominacion')));
        $confProvincias    = $this->Proveedore->ConfProvincia->find('list',  array('conditions'=>array('conf_departamento_id'=>$this->request->data["Proveedore"]["conf_departamento_id"]),'fields'=>array('id','denominacion')));
        $confDistritos     = $this->Proveedore->ConfDistrito->find('list',   array('conditions'=>array('conf_provincia_id'=>$this->request->data["Proveedore"]["conf_provincia_id"]),'fields'=>array('id','denominacion')));
		$this->set(compact('condicionpagos', 'estadocontribuyentes','confPais','confDepartamentos','confProvincias','confDistritos'));
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
		$this->Proveedore->id = $id;
		if (!$this->Proveedore->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Proveedore->delete()) {
//			$this->Session->setFlash(__('Proveedore deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Proveedore was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	function select ($tipo=null,$id=null) {
        $this->layout='ajax';
        $this->set('id',$id);
        $this->set('tipo',$tipo);
       		   if($tipo==1){
        	$confDepartamentos = $this->Proveedore->ConfDepartamento->find('list',array('conditions'=>array('conf_pai_id'=>$id),'fields'=>array('id','denominacion')));
			$this->set(compact('confDepartamentos'));
        }else  if($tipo==2){
        	$confProvincias = $this->Proveedore->ConfProvincia->find('list',array('conditions'=>array('conf_departamento_id'=>$id),'fields'=>array('id','denominacion')));
			$this->set(compact('confProvincias'));
        }else {
        	$confDistritos = $this->Proveedore->ConfDistrito->find('list',array('conditions'=>array('conf_provincia_id'=>$id),'fields'=>array('id','denominacion')));
			$this->set(compact('confDistritos'));
        }
	}
}

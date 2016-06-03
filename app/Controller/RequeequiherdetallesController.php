<?php
App::uses('AppController', 'Controller');
/**
 * Requeequiherdetalles Controller
 *
 * @property Requeequiherdetalle $Requeequiherdetalle
 */
class RequeequiherdetallesController extends AppController {
	var $paginate = array('limit'=>50);
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html', 'Productos');

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
		$this->Requeequiherdetalle->recursive = 0;
		$this->set('requeequiherdetalles', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Requeequiherdetalle->id = $id;
		if (!$this->Requeequiherdetalle->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->Requeequiherdetalle->recursive = 3;
		$this->set('requeequiherdetalle', $this->Requeequiherdetalle->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Requeequiherdetalle->create();
			$this->Requeequiherdetalle->begin();
			if(!empty($this->request->data['Requeequiherdetalle']['fecha_requerimiento'])){
				$this->request->data['Requeequiherdetalle']['fecha_requerimiento'] = cambiar_formato_fecha($this->request->data['Requeequiherdetalle']['fecha_requerimiento']);
			}
			if(!empty($this->request->data['Requeequiherdetalle']['fecha_entrada'])){
				$this->request->data['Requeequiherdetalle']['fecha_entrada'] = cambiar_formato_fecha($this->request->data['Requeequiherdetalle']['fecha_entrada']);
			}
			$this->request->data['Requeequiherdetalle']['statuse_id'] = 2;
			if ($this->Requeequiherdetalle->save($this->request->data)) {
				$contar    = 0;
			    $inicio    = 0;
			    $i2        = 0;
                $Productos = $this->Session->read("Productos");
				$id_req = $this->Requeequiherdetalle->id;
				if(isset($Productos)){
					 foreach($Productos as $Producto){
					 	  $Producto['id2'] = $i2;
	                      $i2++;
					      if($Producto['condicion']==1){
				      	       $this->request->data['Requeequiherproducto']['requeequiherdetalle_id'] = $id_req;
				      	       $this->request->data['Requeequiherproducto']['producto_id']            = $Producto["codigo"];
							   $this->request->data['Requeequiherproducto']['cantidad']               = $Producto["cantidad"];
							   $this->Requeequiherdetalle->Requeequiherproducto->create();
							   if ($this->Requeequiherdetalle->Requeequiherproducto->save($this->request->data)) {
									$inicio++;
								} else {
									$contar++;
								}
                          }//fin if
					  }//fin foreach
				}//fin if
				if($contar==0 && $inicio!=0) {
					    $this->Requeequiherdetalle->commit();
						msj('Registro Guardado Exitosamente','exito');
						$this->set('URL',"/".$this->name."/add");
			            $this->render('redirect');
			    }else{
			    	    $this->Requeequiherdetalle->rollback();
						msj('Registro No Guardado','error');
						$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Requeequiherdetalle),$this->Requeequiherdetalle->validate));
				        $this->render('error');
				}
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Requeequiherdetalle),$this->Requeequiherdetalle->validate));
		        $this->render('error');
			}
		}


        $numero  = $this->Requeequiherdetalle->find('all', array('order'=>array('contador'=>'desc')));
        $numeros = $numero[0]["Requeequiherdetalle"]["contador"]+1;
        $usuario_id = $this->Session->read("USUARIO_ID");
        $usuarios = $this->Requeequiherdetalle->Solicitada->find('list',array('conditions'=>array('id'=>$usuario_id)));
		$area = $this->Session->read("USUARIO_AREA");
		$areas = $this->Requeequiherdetalle->Area->find('list',array('conditions'=>array('id'=>$area)));
		$serviciosrealizados = $this->Requeequiherdetalle->Serviciosrealizado->find('list');
		$this->set(compact('areas', 'area','usuarios', 'usuario_id','serviciosrealizados', 'numeros'));





	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Requeequiherdetalle->id = $id;
		if (!$this->Requeequiherdetalle->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			if(!empty($this->request->data['Requeequiherdetalle']['fecha_requerimiento'])){
				$this->request->data['Requeequiherdetalle']['fecha_requerimiento'] = cambiar_formato_fecha($this->request->data['Requeequiherdetalle']['fecha_requerimiento']);
			}
			if(!empty($this->request->data['Requeequiherdetalle']['fecha_entrada'])){
				$this->request->data['Requeequiherdetalle']['fecha_entrada'] = cambiar_formato_fecha($this->request->data['Requeequiherdetalle']['fecha_entrada']);
			}
			if(!empty($this->request->data['Requeequiherdetalle']['fecha_aprobado'])){
				$this->request->data['Requeequiherdetalle']['fecha_aprobado'] = cambiar_formato_fecha($this->request->data['Requeequiherdetalle']['fecha_aprobado']);
			}
			if ($this->Requeequiherdetalle->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Requeequiherdetalle),$this->Requeequiherdetalle->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Requeequiherdetalle->read(null, $id);
		}
		$this->Requeequiherdetalle->Requeequiherproducto->recursive = 2;
		$this->set('requeequiherdetalle', $this->Requeequiherdetalle->Requeequiherproducto->find('all', array('conditions'=>array('requeequiherdetalle_id'=>$id))));

		$serviciosrealizados2 = $this->Requeequiherdetalle->Serviciosrealizado->find('all', array('conditions'=>array('Serviciosrealizado.id'=>$this->request->data["Requeequiherdetalle"]["serviciosrealizado_id"])));
        $this->set(compact('serviciosrealizados2'));

	    $gerente_id = $this->Session->read("USUARIO_ID");
        $gerentes   = $this->Requeequiherdetalle->Gerente->find('list',array('conditions'=>array('id'=>$gerente_id)));

        $usuario_id = $this->request->data["Requeequiherdetalle"]["solicitada_id"];
        $usuarios   = $this->Requeequiherdetalle->Solicitada->find('list',array('conditions'=>array('id'=>$this->request->data["Requeequiherdetalle"]["solicitada_id"])));


		$area  = $this->Session->read("USUARIO_AREA");
		$cargo = $this->Session->read("USUARIO_CARGO");
		$areas = $this->Requeequiherdetalle->Area->find('list',array('conditions'=>array('id'=>$area)));
		$serviciosrealizados = $this->Requeequiherdetalle->Serviciosrealizado->find('list');
		$statuses = $this->Requeequiherdetalle->Statuse->find('list');
		$this->set(compact('areas', 'area','usuarios', 'usuario_id','serviciosrealizados', 'cargo', 'gerentes', 'gerente_id', 'statuses'));
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
		$this->Requeequiherdetalle->id = $id;
		if (!$this->Requeequiherdetalle->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Requeequiherdetalle->delete()) {
//			$this->Session->setFlash(__('Requeequiherdetalle deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Requeequiherdetalle was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	function select_serv($id=null){
		$this->layout='ajax';
        $serviciosrealizados = $this->Requeequiherdetalle->Serviciosrealizado->read(null, $id);
        $this->set(compact('serviciosrealizados'));
	}
}

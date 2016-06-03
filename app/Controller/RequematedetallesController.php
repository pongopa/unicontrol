<?php
App::uses('AppController', 'Controller');
/**
 * Requematedetalles Controller
 *
 * @property Requematedetalle $Requematedetalle
 */
class RequematedetallesController extends AppController {
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
		$this->Requematedetalle->recursive = 0;
		$this->set('requematedetalles', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Requematedetalle->id = $id;
		if (!$this->Requematedetalle->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->Requematedetalle->recursive = 3;
		$this->set('requematedetalle', $this->Requematedetalle->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Requematedetalle->create();
			$this->Requematedetalle->begin();
			if(!empty($this->request->data['Requematedetalle']['fecha_requerimiento'])){
				$this->request->data['Requematedetalle']['fecha_requerimiento'] = cambiar_formato_fecha($this->request->data['Requematedetalle']['fecha_requerimiento']);
			}
			if(!empty($this->request->data['Requematedetalle']['fecha_salida'])){
				$this->request->data['Requematedetalle']['fecha_salida'] = cambiar_formato_fecha($this->request->data['Requematedetalle']['fecha_salida']);
			}
			if(!empty($this->request->data['Requematedetalle']['fecha_solicitada_por'])){
				$this->request->data['Requematedetalle']['fecha_solicitada_por'] = cambiar_formato_fecha($this->request->data['Requematedetalle']['fecha_solicitada_por']);
			}
			if(!empty($this->request->data['Requematedetalle']['fecha_revisado_por_1'])){
				$this->request->data['Requematedetalle']['fecha_revisado_por_1'] = cambiar_formato_fecha($this->request->data['Requematedetalle']['fecha_revisado_por_1']);
			}
			if(!empty($this->request->data['Requematedetalle']['fecha_revisado_por_2'])){
				$this->request->data['Requematedetalle']['fecha_revisado_por_2'] = cambiar_formato_fecha($this->request->data['Requematedetalle']['fecha_revisado_por_2']);
			}
			if ($this->Requematedetalle->save($this->request->data)) {
				$contar    = 0;
			    $inicio    = 0;
			    $i2        = 0;
                $Productos = $this->Session->read("Productos");
				$id_req    = $this->Requematedetalle->id;
				if(isset($Productos)){
					 foreach($Productos as $Producto){
					 	  $Producto['id2'] = $i2;
	                      $i2++;
					      if($Producto['condicion']==1){
				      	       $this->request->data['Requemateproducto']['requematedetalle_id'] = $id_req;
				      	       $this->request->data['Requemateproducto']['producto_id']         = $Producto["codigo"];
							   $this->request->data['Requemateproducto']['cantidad']            = $Producto["cantidad"];
							   $this->Requematedetalle->Requemateproducto->create();
							   if ($this->Requematedetalle->Requemateproducto->save($this->request->data)) {
									$inicio++;
								} else {
									$contar++;
								}
                          }//fin if
					  }//fin foreach
				}//fin if
				if($contar==0 && $inicio!=0) {
					    $this->Requematedetalle->commit();
						msj('Registro Guardado Exitosamente','exito');
						$this->set('URL',"/".$this->name."/add");
			            $this->render('redirect');
				}else{
                        $this->Requematedetalle->rollback();
						msj('Registro No Guardado','error');
						$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Requematedetalle),$this->Requematedetalle->validate));
				        $this->render('error');
				}
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Requematedetalle),$this->Requematedetalle->validate));
		        $this->render('error');
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Requematedetalle->id = $id;
		if (!$this->Requematedetalle->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			if(!empty($this->request->data['Requematedetalle']['fecha_requerimiento'])){
				$this->request->data['Requematedetalle']['fecha_requerimiento'] = cambiar_formato_fecha($this->request->data['Requematedetalle']['fecha_requerimiento']);
			}
			if(!empty($this->request->data['Requematedetalle']['fecha_salida'])){
				$this->request->data['Requematedetalle']['fecha_salida'] = cambiar_formato_fecha($this->request->data['Requematedetalle']['fecha_salida']);
			}
			if(!empty($this->request->data['Requematedetalle']['fecha_solicitada_por'])){
				$this->request->data['Requematedetalle']['fecha_solicitada_por'] = cambiar_formato_fecha($this->request->data['Requematedetalle']['fecha_solicitada_por']);
			}
			if(!empty($this->request->data['Requematedetalle']['fecha_revisado_por_1'])){
				$this->request->data['Requematedetalle']['fecha_revisado_por_1'] = cambiar_formato_fecha($this->request->data['Requematedetalle']['fecha_revisado_por_1']);
			}
			if(!empty($this->request->data['Requematedetalle']['fecha_revisado_por_2'])){
				$this->request->data['Requematedetalle']['fecha_revisado_por_2'] = cambiar_formato_fecha($this->request->data['Requematedetalle']['fecha_revisado_por_2']);
			}
			if ($this->Requematedetalle->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Requematedetalle),$this->Requematedetalle->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Requematedetalle->read(null, $id);
		}
		$this->Requematedetalle->Requemateproducto->recursive = 2;
		$this->set('requematedetalle', $this->Requematedetalle->Requemateproducto->find('all', array('conditions'=>array('requematedetalle_id'=>$id))));

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
		$this->Requematedetalle->id = $id;
		if (!$this->Requematedetalle->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Requematedetalle->delete()) {
//			$this->Session->setFlash(__('Requematedetalle deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Requematedetalle was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

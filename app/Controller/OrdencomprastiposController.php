<?php
App::uses('AppController', 'Controller');
/**
 * Ordencomprastipos Controller
 *
 * @property Ordencomprastipo $Ordencomprastipo
 */
class OrdencomprastiposController extends AppController {
	var $paginate = array('limit'=>50);
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html');

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
		$this->Ordencomprastipo->recursive = 0;
		$this->set('ordencomprastipos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Ordencomprastipo->id = $id;
		if (!$this->Ordencomprastipo->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('ordencomprastipo', $this->Ordencomprastipo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Ordencomprastipo->create();
			if ($this->Ordencomprastipo->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Ordencomprastipo),$this->Ordencomprastipo->validate));
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
		$this->Ordencomprastipo->id = $id;
		if (!$this->Ordencomprastipo->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			if ($this->Ordencomprastipo->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Ordencomprastipo),$this->Ordencomprastipo->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Ordencomprastipo->read(null, $id);
		}
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
		$this->Ordencomprastipo->id = $id;
		if (!$this->Ordencomprastipo->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Ordencomprastipo->delete()) {
//			$this->Session->setFlash(__('Ordencomprastipo deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Ordencomprastipo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

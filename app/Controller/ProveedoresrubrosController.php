<?php
App::uses('AppController', 'Controller');
/**
 * Proveedoresrubros Controller
 *
 * @property Proveedoresrubro $Proveedoresrubro
 */
class ProveedoresrubrosController extends AppController {
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
		$this->Proveedoresrubro->recursive = 0;
		$this->set('proveedoresrubros', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Proveedoresrubro->id = $id;
		if (!$this->Proveedoresrubro->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('proveedoresrubro', $this->Proveedoresrubro->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Proveedoresrubro->create();
			if ($this->Proveedoresrubro->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedoresrubro),$this->Proveedoresrubro->validate));
		        $this->render('error');
			}
		}
		$proveedores = $this->Proveedoresrubro->Proveedore->find('list');
		$rubros = $this->Proveedoresrubro->Rubro->find('list');
		$this->set(compact('proveedores', 'rubros'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Proveedoresrubro->id = $id;
		if (!$this->Proveedoresrubro->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			if ($this->Proveedoresrubro->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedoresrubro),$this->Proveedoresrubro->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Proveedoresrubro->read(null, $id);
		}
		$proveedores = $this->Proveedoresrubro->Proveedore->find('list');
		$rubros = $this->Proveedoresrubro->Rubro->find('list');
		$this->set(compact('proveedores', 'rubros'));
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
		$this->Proveedoresrubro->id = $id;
		if (!$this->Proveedoresrubro->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Proveedoresrubro->delete()) {
//			$this->Session->setFlash(__('Proveedoresrubro deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Proveedoresrubro was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

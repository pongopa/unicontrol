<?php
App::uses('AppController', 'Controller');
/**
 * Proveedoresformapagos Controller
 *
 * @property Proveedoresformapago $Proveedoresformapago
 */
class ProveedoresformapagosController extends AppController {
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
		$this->Proveedoresformapago->recursive = 0;
		$this->set('proveedoresformapagos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Proveedoresformapago->id = $id;
		if (!$this->Proveedoresformapago->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('proveedoresformapago', $this->Proveedoresformapago->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Proveedoresformapago->create();
			if ($this->Proveedoresformapago->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedoresformapago),$this->Proveedoresformapago->validate));
		        $this->render('error');
			}
		}
		$proveedores = $this->Proveedoresformapago->Proveedore->find('list');
		$formapagos = $this->Proveedoresformapago->Formapago->find('list');
		$this->set(compact('proveedores', 'formapagos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Proveedoresformapago->id = $id;
		if (!$this->Proveedoresformapago->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			if ($this->Proveedoresformapago->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedoresformapago),$this->Proveedoresformapago->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Proveedoresformapago->read(null, $id);
		}
		$proveedores = $this->Proveedoresformapago->Proveedore->find('list');
		$formapagos = $this->Proveedoresformapago->Formapago->find('list');
		$this->set(compact('proveedores', 'formapagos'));
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
		$this->Proveedoresformapago->id = $id;
		if (!$this->Proveedoresformapago->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Proveedoresformapago->delete()) {
//			$this->Session->setFlash(__('Proveedoresformapago deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Proveedoresformapago was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('AppController', 'Controller');
/**
 * Proveedoresvendedores Controller
 *
 * @property Proveedoresvendedore $Proveedoresvendedore
 */
class ProveedoresvendedoresController extends AppController {
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
		$this->Proveedoresvendedore->recursive = 0;
		$this->set('proveedoresvendedores', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Proveedoresvendedore->id = $id;
		if (!$this->Proveedoresvendedore->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('proveedoresvendedore', $this->Proveedoresvendedore->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Proveedoresvendedore->create();
			if ($this->Proveedoresvendedore->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedoresvendedore),$this->Proveedoresvendedore->validate));
		        $this->render('error');
			}
		}
		$proveedores = $this->Proveedoresvendedore->Proveedore->find('list');
		$this->set(compact('proveedores'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Proveedoresvendedore->id = $id;
		if (!$this->Proveedoresvendedore->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			if ($this->Proveedoresvendedore->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedoresvendedore),$this->Proveedoresvendedore->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Proveedoresvendedore->read(null, $id);
		}
		$proveedores = $this->Proveedoresvendedore->Proveedore->find('list');
		$this->set(compact('proveedores'));
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
		$this->Proveedoresvendedore->id = $id;
		if (!$this->Proveedoresvendedore->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Proveedoresvendedore->delete()) {
//			$this->Session->setFlash(__('Proveedoresvendedore deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Proveedoresvendedore was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

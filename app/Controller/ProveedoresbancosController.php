<?php
App::uses('AppController', 'Controller');
/**
 * Proveedoresbancos Controller
 *
 * @property Proveedoresbanco $Proveedoresbanco
 */
class ProveedoresbancosController extends AppController {
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
		$this->Proveedoresbanco->recursive = 0;
		$this->set('proveedoresbancos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Proveedoresbanco->id = $id;
		if (!$this->Proveedoresbanco->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('proveedoresbanco', $this->Proveedoresbanco->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Proveedoresbanco->create();
			if ($this->Proveedoresbanco->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedoresbanco),$this->Proveedoresbanco->validate));
		        $this->render('error');
			}
		}
		$proveedores = $this->Proveedoresbanco->Proveedore->find('list');
		$bancos = $this->Proveedoresbanco->Banco->find('list');
		$this->set(compact('proveedores', 'bancos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Proveedoresbanco->id = $id;
		if (!$this->Proveedoresbanco->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			if ($this->Proveedoresbanco->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Proveedoresbanco),$this->Proveedoresbanco->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Proveedoresbanco->read(null, $id);
		}
		$proveedores = $this->Proveedoresbanco->Proveedore->find('list');
		$bancos = $this->Proveedoresbanco->Banco->find('list');
		$this->set(compact('proveedores', 'bancos'));
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
		$this->Proveedoresbanco->id = $id;
		if (!$this->Proveedoresbanco->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Proveedoresbanco->delete()) {
//			$this->Session->setFlash(__('Proveedoresbanco deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Proveedoresbanco was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

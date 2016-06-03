<?php
App::uses('AppController', 'Controller');
/**
 * Clientesvendedores Controller
 *
 * @property Clientesvendedore $Clientesvendedore
 */
class ClientesvendedoresController extends AppController {
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
		$this->Clientesvendedore->recursive = 0;
		$this->set('clientesvendedores', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Clientesvendedore->id = $id;
		if (!$this->Clientesvendedore->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('clientesvendedore', $this->Clientesvendedore->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Clientesvendedore->create();
			if ($this->Clientesvendedore->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Clientesvendedore),$this->Clientesvendedore->validate));
		        $this->render('error');
			}
		}
		$clientes = $this->Clientesvendedore->Cliente->find('list');
		$this->set(compact('clientes'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Clientesvendedore->id = $id;
		if (!$this->Clientesvendedore->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			if ($this->Clientesvendedore->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Clientesvendedore),$this->Clientesvendedore->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Clientesvendedore->read(null, $id);
		}
		$clientes = $this->Clientesvendedore->Cliente->find('list');
		$this->set(compact('clientes'));
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
		$this->Clientesvendedore->id = $id;
		if (!$this->Clientesvendedore->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Clientesvendedore->delete()) {
//			$this->Session->setFlash(__('Clientesvendedore deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Clientesvendedore was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

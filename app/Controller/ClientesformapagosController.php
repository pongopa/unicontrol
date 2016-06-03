<?php
App::uses('AppController', 'Controller');
/**
 * Clientesformapagos Controller
 *
 * @property Clientesformapago $Clientesformapago
 */
class ClientesformapagosController extends AppController {
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
		$this->Clientesformapago->recursive = 0;
		$this->set('clientesformapagos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Clientesformapago->id = $id;
		if (!$this->Clientesformapago->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('clientesformapago', $this->Clientesformapago->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Clientesformapago->create();
			if ($this->Clientesformapago->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Clientesformapago),$this->Clientesformapago->validate));
		        $this->render('error');
			}
		}
		$clientes = $this->Clientesformapago->Cliente->find('list');
		$formapagos = $this->Clientesformapago->Formapago->find('list');
		$this->set(compact('clientes', 'formapagos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Clientesformapago->id = $id;
		if (!$this->Clientesformapago->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			if ($this->Clientesformapago->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Clientesformapago),$this->Clientesformapago->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Clientesformapago->read(null, $id);
		}
		$clientes = $this->Clientesformapago->Cliente->find('list');
		$formapagos = $this->Clientesformapago->Formapago->find('list');
		$this->set(compact('clientes', 'formapagos'));
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
		$this->Clientesformapago->id = $id;
		if (!$this->Clientesformapago->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Clientesformapago->delete()) {
//			$this->Session->setFlash(__('Clientesformapago deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Clientesformapago was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

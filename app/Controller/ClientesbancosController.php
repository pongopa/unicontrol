<?php
App::uses('AppController', 'Controller');
/**
 * Clientesbancos Controller
 *
 * @property Clientesbanco $Clientesbanco
 */
class ClientesbancosController extends AppController {
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
		$this->Clientesbanco->recursive = 0;
		$this->set('clientesbancos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Clientesbanco->id = $id;
		if (!$this->Clientesbanco->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('clientesbanco', $this->Clientesbanco->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Clientesbanco->create();
			if ($this->Clientesbanco->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Clientesbanco),$this->Clientesbanco->validate));
		        $this->render('error');
			}
		}
		$clientes = $this->Clientesbanco->Cliente->find('list');
		$bancos = $this->Clientesbanco->Banco->find('list');
		$this->set(compact('clientes', 'bancos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Clientesbanco->id = $id;
		if (!$this->Clientesbanco->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			if ($this->Clientesbanco->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Clientesbanco),$this->Clientesbanco->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Clientesbanco->read(null, $id);
		}
		$clientes = $this->Clientesbanco->Cliente->find('list');
		$bancos = $this->Clientesbanco->Banco->find('list');
		$this->set(compact('clientes', 'bancos'));
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
		$this->Clientesbanco->id = $id;
		if (!$this->Clientesbanco->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Clientesbanco->delete()) {
//			$this->Session->setFlash(__('Clientesbanco deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Clientesbanco was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

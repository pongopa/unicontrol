<?php
App::uses('AppController', 'Controller');
/**
 * Clientesrubros Controller
 *
 * @property Clientesrubro $Clientesrubro
 */
class ClientesrubrosController extends AppController {
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
		$this->Clientesrubro->recursive = 0;
		$this->set('clientesrubros', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Clientesrubro->id = $id;
		if (!$this->Clientesrubro->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('clientesrubro', $this->Clientesrubro->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Clientesrubro->create();
			if ($this->Clientesrubro->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Clientesrubro),$this->Clientesrubro->validate));
		        $this->render('error');
			}
		}
		$clientes = $this->Clientesrubro->Cliente->find('list');
		$rubros = $this->Clientesrubro->Rubro->find('list');
		$this->set(compact('clientes', 'rubros'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Clientesrubro->id = $id;
		if (!$this->Clientesrubro->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			if ($this->Clientesrubro->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Clientesrubro),$this->Clientesrubro->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Clientesrubro->read(null, $id);
		}
		$clientes = $this->Clientesrubro->Cliente->find('list');
		$rubros = $this->Clientesrubro->Rubro->find('list');
		$this->set(compact('clientes', 'rubros'));
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
		$this->Clientesrubro->id = $id;
		if (!$this->Clientesrubro->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Clientesrubro->delete()) {
//			$this->Session->setFlash(__('Clientesrubro deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Clientesrubro was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('AppController', 'Controller');
/**
 * Bancos Controller
 *
 * @property Banco $Banco
 */
class BancosController extends AppController {
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html');
	var $paginate = array('limit'=>50);

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
		$this->Banco->recursive = 0;
		$this->set('bancos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Banco->id = $id;
		if (!$this->Banco->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('banco', $this->Banco->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)) {
			$this->Banco->create();
			if ($this->Banco->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Banco),$this->Banco->validate));
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
		$this->Banco->id = $id;
		if (!$this->Banco->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)) {
			if ($this->Banco->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Banco),$this->Banco->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Banco->read(null, $id);
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
		$this->Banco->id = $id;
		if (!$this->Banco->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Banco->delete()) {
//			$this->Session->setFlash(__('Banco deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Banco was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

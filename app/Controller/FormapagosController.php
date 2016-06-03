<?php
App::uses('AppController', 'Controller');
/**
 * Formapagos Controller
 *
 * @property Formapago $Formapago
 */
class FormapagosController extends AppController {
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
		$this->Formapago->recursive = 0;
		$this->set('formapagos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Formapago->id = $id;
		if (!$this->Formapago->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('formapago', $this->Formapago->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Formapago->create();
			if ($this->Formapago->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
			    $this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Formapago),$this->Formapago->validate));
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
		$this->Formapago->id = $id;
		if (!$this->Formapago->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)) {
			if ($this->Formapago->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
			    $this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Formapago),$this->Formapago->validate));
		        $this->render('error');
			}


		} else {
			$this->request->data = $this->Formapago->read(null, $id);
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
		$this->Formapago->id = $id;
		if (!$this->Formapago->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Formapago->delete()) {
//			$this->Session->setFlash(__('Formapago deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Formapago was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

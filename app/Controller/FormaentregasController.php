<?php
App::uses('AppController', 'Controller');
/**
 * Formaentregas Controller
 *
 * @property Formaentrega $Formaentrega
 */
class FormaentregasController extends AppController {

    var $paginate = array('limit'=>10);
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html', 'Productos');

    function beforeFilter(){
		$this->checkSession();
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout='ajax';
		$this->Formaentrega->recursive = 0;
		$this->set('formaentregas', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Formaentrega->id = $id;
		if (!$this->Formaentrega->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('formaentrega', $this->Formaentrega->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Formaentrega->create();
			$this->Formaentrega->begin();
			if ($this->Formaentrega->save($this->request->data)) {
                $this->Formaentrega->commit();
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
			    $this->render('/Pages/redirect');
			} else {
                $this->Formaentrega->rollback();
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Formaentrega),$this->Formaentrega->validate));
				$this->render('/Pages/error');
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
		$this->Formaentrega->id = $id;
		if (!$this->Formaentrega->exists()) {
			msj('Registro no encotrado','error');
		}
		if (!empty($this->request->data)){
			$this->Formaentrega->begin();
			if ($this->Formaentrega->save($this->request->data)) {
                $this->Formaentrega->commit();
				msj('Registro Modificado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('/Pages/redirect');
			} else {
                $this->Formaentrega->rollback();
				msj('Registro no modificado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Formaentrega),$this->Formaentrega->validate));
		        $this->render('/Pages/error');
			}
		} else {
			$this->request->data = $this->Formaentrega->read(null, $id);
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
		$this->Formaentrega->id = $id;
		if (!$this->Formaentrega->exists()) {
			throw new NotFoundException(__('Invalid formaentrega'));
		}
		if ($this->Formaentrega->delete()) {
			//$this->Session->setFlash(__('Formaentrega deleted'));
			$this->redirect(array('action'=>'index'));
		}
		//$this->Session->setFlash(__('Formaentrega was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

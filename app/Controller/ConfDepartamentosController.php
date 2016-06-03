<?php
App::uses('AppController', 'Controller');
/**
 * ConfDepartamentos Controller
 *
 * @property ConfDepartamento $ConfDepartamento
 */
class ConfDepartamentosController extends AppController {

    var $paginate = array('limit'=>50);
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
		$this->ConfDepartamento->recursive = 0;
		$this->set('confDepartamentos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->ConfDepartamento->id = $id;
		if (!$this->ConfDepartamento->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('confDepartamento', $this->ConfDepartamento->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->ConfDepartamento->create();
			$this->ConfDepartamento->begin();
			if ($this->ConfDepartamento->save($this->request->data)) {
                $this->ConfDepartamento->commit();
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
			    $this->render('/Pages/redirect');
			} else {
                $this->ConfDepartamento->rollback();
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->ConfDepartamento),$this->ConfDepartamento->validate));
				$this->render('/Pages/error');
			}
		}
		$confPais = $this->ConfDepartamento->ConfPai->find('list');
		$this->set(compact('confPais'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->ConfDepartamento->id = $id;
		if (!$this->ConfDepartamento->exists()) {
			msj('Registro no encotrado','error');
		}
		if (!empty($this->request->data)){
			$this->ConfDepartamento->begin();
			if ($this->ConfDepartamento->save($this->request->data)) {
                $this->ConfDepartamento->commit();
				msj('Registro Modificado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('/Pages/redirect');
			} else {
                $this->ConfDepartamento->rollback();
				msj('Registro no modificado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->ConfDepartamento),$this->ConfDepartamento->validate));
		        $this->render('/Pages/error');
			}
		} else {
			$this->request->data = $this->ConfDepartamento->read(null, $id);
		}
		$confPais = $this->ConfDepartamento->ConfPai->find('list');
		$this->set(compact('confPais'));
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
		$this->ConfDepartamento->id = $id;
		if (!$this->ConfDepartamento->exists()) {
			throw new NotFoundException(__('Invalid conf departamento'));
		}
		if ($this->ConfDepartamento->delete()) {
			//$this->Session->setFlash(__('Conf departamento deleted'));
			$this->redirect(array('action'=>'index'));
		}
		//$this->Session->setFlash(__('Conf departamento was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

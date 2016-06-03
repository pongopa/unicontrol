<?php
App::uses('AppController', 'Controller');
/**
 * Cargos Controller
 *
 * @property Cargo $Cargo
 */
class CargosController extends AppController {

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
		$this->Cargo->recursive = 0;
		$this->set('cargos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Cargo->id = $id;
		if (!$this->Cargo->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('cargo', $this->Cargo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Cargo->create();
			$this->Cargo->begin();
			if ($this->Cargo->save($this->request->data)) {
                $this->Cargo->commit();
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
			    $this->render('/Pages/redirect');
			} else {
                $this->Cargo->rollback();
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Cargo),$this->Cargo->validate));
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
		$this->Cargo->id = $id;
		if (!$this->Cargo->exists()) {
			msj('Registro no encotrado','error');
		}
		if (!empty($this->request->data)){
			$this->Cargo->begin();
			if ($this->Cargo->save($this->request->data)) {
                $this->Cargo->commit();
				msj('Registro Modificado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('/Pages/redirect');
			} else {
                $this->Cargo->rollback();
				msj('Registro no modificado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Cargo),$this->Cargo->validate));
		        $this->render('/Pages/error');
			}
		} else {
			$this->request->data = $this->Cargo->read(null, $id);
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
		$this->Cargo->id = $id;
		if (!$this->Cargo->exists()) {
			throw new NotFoundException(__('Invalid cargo'));
		}
		if ($this->Cargo->delete()) {
			//$this->Session->setFlash(__('Cargo deleted'));
			$this->redirect(array('action'=>'index'));
		}
		//$this->Session->setFlash(__('Cargo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

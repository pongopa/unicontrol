<?php
App::uses('AppController', 'Controller');
/**
 * Estadocontribuyentes Controller
 *
 * @property Estadocontribuyente $Estadocontribuyente
 */
class EstadocontribuyentesController extends AppController {

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
		$this->Estadocontribuyente->recursive = 0;
		$this->set('estadocontribuyentes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Estadocontribuyente->id = $id;
		if (!$this->Estadocontribuyente->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('estadocontribuyente', $this->Estadocontribuyente->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Estadocontribuyente->create();
			$this->Estadocontribuyente->begin();
			if ($this->Estadocontribuyente->save($this->request->data)) {
                $this->Estadocontribuyente->commit();
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
			    $this->render('redirect');
			} else {
                $this->Estadocontribuyente->rollback();
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Estadocontribuyente),$this->Estadocontribuyente->validate));
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
		$this->Estadocontribuyente->id = $id;
		if (!$this->Estadocontribuyente->exists()) {
			msj('Registro no encotrado','error');
		}
		if (!empty($this->request->data)){
			$this->Estadocontribuyente->begin();
			if ($this->Estadocontribuyente->save($this->request->data)) {
                $this->Estadocontribuyente->commit();
				msj('Registro Modificado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
                $this->Estadocontribuyente->rollback();
				msj('Registro no modificado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Estadocontribuyente),$this->Estadocontribuyente->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Estadocontribuyente->read(null, $id);
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
		$this->Estadocontribuyente->id = $id;
		if (!$this->Estadocontribuyente->exists()) {
			throw new NotFoundException(__('Invalid estadocontribuyente'));
		}
		if ($this->Estadocontribuyente->delete()) {
			//$this->Session->setFlash(__('Estadocontribuyente deleted'));
			$this->redirect(array('action'=>'index'));
		}
		//$this->Session->setFlash(__('Estadocontribuyente was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

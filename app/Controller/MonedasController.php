<?php
App::uses('AppController', 'Controller');
/**
 * Monedas Controller
 *
 * @property Moneda $Moneda
 */
class MonedasController extends AppController {

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
		$this->Moneda->recursive = 0;
		$this->set('monedas', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Moneda->id = $id;
		if (!$this->Moneda->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('moneda', $this->Moneda->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Moneda->create();
			$this->Moneda->begin();
			if ($this->Moneda->save($this->request->data)) {
                $this->Moneda->commit();
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
			    $this->render('/Pages/redirect');
			} else {
                $this->Moneda->rollback();
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Moneda),$this->Moneda->validate));
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
		$this->Moneda->id = $id;
		if (!$this->Moneda->exists()) {
			msj('Registro no encotrado','error');
		}
		if (!empty($this->request->data)){
			$this->Moneda->begin();
			if ($this->Moneda->save($this->request->data)) {
                $this->Moneda->commit();
				msj('Registro Modificado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('/Pages/redirect');
			} else {
                $this->Moneda->rollback();
				msj('Registro no modificado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Moneda),$this->Moneda->validate));
		        $this->render('/Pages/error');
			}
		} else {
			$this->request->data = $this->Moneda->read(null, $id);
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
		$this->Moneda->id = $id;
		if (!$this->Moneda->exists()) {
			throw new NotFoundException(__('Invalid moneda'));
		}
		if ($this->Moneda->delete()) {
			//$this->Session->setFlash(__('Moneda deleted'));
			$this->redirect(array('action'=>'index'));
		}
		//$this->Session->setFlash(__('Moneda was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('AppController', 'Controller');
/**
 * Productostipos Controller
 *
 * @property Productostipo $Productostipo
 */
class ProductostiposController extends AppController {
	var $paginate = array('limit'=>50);
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html');


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout='ajax';
		$this->Productostipo->recursive = 0;
		$this->set('productostipos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Productostipo->id = $id;
		if (!$this->Productostipo->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('productostipo', $this->Productostipo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Productostipo->create();
			if ($this->Productostipo->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Productostipo),$this->Productostipo->validate));
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
		$this->Productostipo->id = $id;
		if (!$this->Productostipo->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			if ($this->Productostipo->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Productostipo),$this->Productostipo->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Productostipo->read(null, $id);
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
		$this->Productostipo->id = $id;
		if (!$this->Productostipo->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Productostipo->delete()) {
//			$this->Session->setFlash(__('Productostipo deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Productostipo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

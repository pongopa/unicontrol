<?php
App::uses('AppController', 'Controller');
/**
 * Productos Controller
 *
 * @property Producto $Producto
 */
class ProductosController extends AppController {
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
		$this->Producto->recursive = 0;
		$this->set('productos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('producto', $this->Producto->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Producto->create();
			if ($this->Producto->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Producto),$this->Producto->validate));
		        $this->render('error');
			}
		}
		$productosmedidas = $this->Producto->Productosmedida->find('list');
		$this->set(compact('productosmedidas'));

		$productostipos = $this->Producto->Productostipo->find('list');
		$this->set(compact('productostipos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			if ($this->Producto->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Producto),$this->Producto->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Producto->read(null, $id);
		}
		$productosmedidas = $this->Producto->Productosmedida->find('list');
		$this->set(compact('productosmedidas'));

		$productostipos = $this->Producto->Productostipo->find('list');
		$this->set(compact('productostipos'));
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
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Producto->delete()) {
//			$this->Session->setFlash(__('Producto deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Producto was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

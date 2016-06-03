<?php
App::uses('AppController', 'Controller');
/**
 * Ordencomprasproductos Controller
 *
 * @property Ordencomprasproducto $Ordencomprasproducto
 */
class OrdencomprasproductosController extends AppController {

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
		$this->Ordencomprasproducto->recursive = 0;
		$this->set('ordencomprasproductos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Ordencomprasproducto->id = $id;
		if (!$this->Ordencomprasproducto->exists()) {
			throw new NotFoundException(__('Invalid ordencomprasproducto'));
		}
		$this->set('ordencomprasproducto', $this->Ordencomprasproducto->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ordencomprasproducto->create();
			if ($this->Ordencomprasproducto->save($this->request->data)) {
				$this->Session->setFlash(__('The ordencomprasproducto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ordencomprasproducto could not be saved. Please, try again.'));
			}
		}
		$ordencompras = $this->Ordencomprasproducto->Ordencompra->find('list');
		$productos = $this->Ordencomprasproducto->Producto->find('list');
		$this->set(compact('ordencompras', 'productos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Ordencomprasproducto->id = $id;
		if (!$this->Ordencomprasproducto->exists()) {
			throw new NotFoundException(__('Invalid ordencomprasproducto'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ordencomprasproducto->save($this->request->data)) {
				$this->Session->setFlash(__('The ordencomprasproducto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ordencomprasproducto could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Ordencomprasproducto->read(null, $id);
		}
		$ordencompras = $this->Ordencomprasproducto->Ordencompra->find('list');
		$productos = $this->Ordencomprasproducto->Producto->find('list');
		$this->set(compact('ordencompras', 'productos'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Ordencomprasproducto->id = $id;
		if (!$this->Ordencomprasproducto->exists()) {
			throw new NotFoundException(__('Invalid ordencomprasproducto'));
		}
		if ($this->Ordencomprasproducto->delete()) {
			$this->Session->setFlash(__('Ordencomprasproducto deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ordencomprasproducto was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

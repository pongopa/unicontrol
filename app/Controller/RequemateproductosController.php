<?php
App::uses('AppController', 'Controller');
/**
 * Requemateproductos Controller
 *
 * @property Requemateproducto $Requemateproducto
 */
class RequemateproductosController extends AppController {

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
		$this->Requemateproducto->recursive = 0;
		$this->set('requemateproductos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Requemateproducto->id = $id;
		if (!$this->Requemateproducto->exists()) {
			throw new NotFoundException(__('Invalid requemateproducto'));
		}
		$this->set('requemateproducto', $this->Requemateproducto->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Requemateproducto->create();
			if ($this->Requemateproducto->save($this->request->data)) {
				$this->Session->setFlash(__('The requemateproducto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The requemateproducto could not be saved. Please, try again.'));
			}
		}
		$requematedetalles = $this->Requemateproducto->Requematedetalle->find('list');
		$productos = $this->Requemateproducto->Producto->find('list');
		$this->set(compact('requematedetalles', 'productos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Requemateproducto->id = $id;
		if (!$this->Requemateproducto->exists()) {
			throw new NotFoundException(__('Invalid requemateproducto'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Requemateproducto->save($this->request->data)) {
				$this->Session->setFlash(__('The requemateproducto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The requemateproducto could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Requemateproducto->read(null, $id);
		}
		$requematedetalles = $this->Requemateproducto->Requematedetalle->find('list');
		$productos = $this->Requemateproducto->Producto->find('list');
		$this->set(compact('requematedetalles', 'productos'));
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
		$this->Requemateproducto->id = $id;
		if (!$this->Requemateproducto->exists()) {
			throw new NotFoundException(__('Invalid requemateproducto'));
		}
		if ($this->Requemateproducto->delete()) {
			$this->Session->setFlash(__('Requemateproducto deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Requemateproducto was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

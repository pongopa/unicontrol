<?php
App::uses('AppController', 'Controller');
/**
 * Requeequiherproductos Controller
 *
 * @property Requeequiherproducto $Requeequiherproducto
 */
class RequeequiherproductosController extends AppController {

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
		$this->Requeequiherproducto->recursive = 0;
		$this->set('requeequiherproductos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Requeequiherproducto->id = $id;
		if (!$this->Requeequiherproducto->exists()) {
			throw new NotFoundException(__('Invalid requeequiherproducto'));
		}
		$this->set('requeequiherproducto', $this->Requeequiherproducto->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Requeequiherproducto->create();
			if ($this->Requeequiherproducto->save($this->request->data)) {
				$this->Session->setFlash(__('The requeequiherproducto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The requeequiherproducto could not be saved. Please, try again.'));
			}
		}
		$requeequiherdetalles = $this->Requeequiherproducto->Requeequiherdetalle->find('list');
		$productos = $this->Requeequiherproducto->Producto->find('list');
		$this->set(compact('requeequiherdetalles', 'productos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Requeequiherproducto->id = $id;
		if (!$this->Requeequiherproducto->exists()) {
			throw new NotFoundException(__('Invalid requeequiherproducto'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Requeequiherproducto->save($this->request->data)) {
				$this->Session->setFlash(__('The requeequiherproducto has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The requeequiherproducto could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Requeequiherproducto->read(null, $id);
		}
		$requeequiherdetalles = $this->Requeequiherproducto->Requeequiherdetalle->find('list');
		$productos = $this->Requeequiherproducto->Producto->find('list');
		$this->set(compact('requeequiherdetalles', 'productos'));
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
		$this->Requeequiherproducto->id = $id;
		if (!$this->Requeequiherproducto->exists()) {
			throw new NotFoundException(__('Invalid requeequiherproducto'));
		}
		if ($this->Requeequiherproducto->delete()) {
			$this->Session->setFlash(__('Requeequiherproducto deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Requeequiherproducto was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

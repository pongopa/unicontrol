<?php
App::uses('AppController', 'Controller');
/**
 * Instituciones Controller
 *
 * @property Institucione $Institucione
 */
class InstitucionesController extends AppController {

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
		$this->Institucione->recursive = 0;
		$this->set('instituciones', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Institucione->id = $id;
		if (!$this->Institucione->exists()) {
			throw new NotFoundException(__('Invalid institucione'));
		}
		$this->set('institucione', $this->Institucione->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Institucione->create();
			if ($this->Institucione->save($this->request->data)) {
				$this->Session->setFlash(__('The institucione has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The institucione could not be saved. Please, try again.'));
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
		$this->Institucione->id = $id;
		if (!$this->Institucione->exists()) {
			throw new NotFoundException(__('Invalid institucione'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Institucione->save($this->request->data)) {
				$this->Session->setFlash(__('The institucione has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The institucione could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Institucione->read(null, $id);
		}
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
		$this->Institucione->id = $id;
		if (!$this->Institucione->exists()) {
			throw new NotFoundException(__('Invalid institucione'));
		}
		if ($this->Institucione->delete()) {
			$this->Session->setFlash(__('Institucione deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Institucione was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

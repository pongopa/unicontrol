<?php
App::uses('AppController', 'Controller');
/**
 * ConfPais Controller
 *
 * @property ConfPai $ConfPai
 */
class ConfPaisController extends AppController {

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
		$this->ConfPai->recursive = 0;
		$this->set('confPais', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->ConfPai->id = $id;
		if (!$this->ConfPai->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('confPai', $this->ConfPai->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->ConfPai->create();
			$this->ConfPai->begin();
			if ($this->ConfPai->save($this->request->data)) {
                $this->ConfPai->commit();
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
			    $this->render('/Pages/redirect');
			} else {
                $this->ConfPai->rollback();
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->ConfPai),$this->ConfPai->validate));
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
		$this->ConfPai->id = $id;
		if (!$this->ConfPai->exists()) {
			msj('Registro no encotrado','error');
		}
		if (!empty($this->request->data)){
			$this->ConfPai->begin();
			if ($this->ConfPai->save($this->request->data)) {
                $this->ConfPai->commit();
				msj('Registro Modificado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('/Pages/redirect');
			} else {
                $this->ConfPai->rollback();
				msj('Registro no modificado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->ConfPai),$this->ConfPai->validate));
		        $this->render('/Pages/error');
			}
		} else {
			$this->request->data = $this->ConfPai->read(null, $id);
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
		$this->ConfPai->id = $id;
		if (!$this->ConfPai->exists()) {
			throw new NotFoundException(__('Invalid conf pai'));
		}
		if ($this->ConfPai->delete()) {
			//$this->Session->setFlash(__('Conf pai deleted'));
			$this->redirect(array('action'=>'index'));
		}
		//$this->Session->setFlash(__('Conf pai was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('AppController', 'Controller');
/**
 * Clientesucursas Controller
 *
 * @property Clientesucursa $Clientesucursa
 */
class ClientesucursasController extends AppController {

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
		$this->Clientesucursa->recursive = 0;
		$this->set('clientesucursas', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Clientesucursa->id = $id;
		if (!$this->Clientesucursa->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('clientesucursa', $this->Clientesucursa->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Clientesucursa->create();
			$this->Clientesucursa->begin();
			if ($this->Clientesucursa->save($this->request->data)) {
                $this->Clientesucursa->commit();
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
			    $this->render('/Pages/redirect');
			} else {
                $this->Clientesucursa->rollback();
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Clientesucursa),$this->Clientesucursa->validate));
				$this->render('/Pages/error');
			}
		}
		$clientes = $this->Clientesucursa->Cliente->find('list');
		$confPais = $this->Clientesucursa->ConfPai->find('list');
		$confDepartamentos = $this->Clientesucursa->ConfDepartamento->find('list');
		$confProvincias = $this->Clientesucursa->ConfProvincia->find('list');
		$confDistritos = $this->Clientesucursa->ConfDistrito->find('list');
		$this->set(compact('clientes', 'confPais', 'confDepartamentos', 'confProvincias', 'confDistritos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Clientesucursa->id = $id;
		if (!$this->Clientesucursa->exists()) {
			msj('Registro no encotrado','error');
		}
		if (!empty($this->request->data)){
			$this->Clientesucursa->begin();
			if ($this->Clientesucursa->save($this->request->data)) {
                $this->Clientesucursa->commit();
				msj('Registro Modificado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('/Pages/redirect');
			} else {
                $this->Clientesucursa->rollback();
				msj('Registro no modificado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Clientesucursa),$this->Clientesucursa->validate));
		        $this->render('/Pages/error');
			}
		} else {
			$this->request->data = $this->Clientesucursa->read(null, $id);
		}
		$clientes = $this->Clientesucursa->Cliente->find('list');
		$confPais = $this->Clientesucursa->ConfPai->find('list');
		$confDepartamentos = $this->Clientesucursa->ConfDepartamento->find('list');
		$confProvincias = $this->Clientesucursa->ConfProvincia->find('list');
		$confDistritos = $this->Clientesucursa->ConfDistrito->find('list');
		$this->set(compact('clientes', 'confPais', 'confDepartamentos', 'confProvincias', 'confDistritos'));
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
		$this->Clientesucursa->id = $id;
		if (!$this->Clientesucursa->exists()) {
			throw new NotFoundException(__('Invalid clientesucursa'));
		}
		if ($this->Clientesucursa->delete()) {
			//$this->Session->setFlash(__('Clientesucursa deleted'));
			$this->redirect(array('action'=>'index'));
		}
		//$this->Session->setFlash(__('Clientesucursa was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

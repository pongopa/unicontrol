<?php
App::uses('AppController', 'Controller');
/**
 * ConfProvincias Controller
 *
 * @property ConfProvincia $ConfProvincia
 */
class ConfProvinciasController extends AppController {

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
		$this->ConfProvincia->recursive = 0;
		$this->set('confProvincias', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->ConfProvincia->id = $id;
		if (!$this->ConfProvincia->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('confProvincia', $this->ConfProvincia->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->ConfProvincia->create();
			$this->ConfProvincia->begin();
			if ($this->ConfProvincia->save($this->request->data)) {
                $this->ConfProvincia->commit();
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
			    $this->render('/Pages/redirect');
			} else {
                $this->ConfProvincia->rollback();
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->ConfProvincia),$this->ConfProvincia->validate));
				$this->render('/Pages/error');
			}
		}
		$confPais = $this->ConfProvincia->ConfPai->find('list');
//		$confDepartamentos = $this->ConfProvincia->ConfDepartamento->find('list');
		$this->set(compact('confPais', 'confDepartamentos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->ConfProvincia->id = $id;
		if (!$this->ConfProvincia->exists()) {
			msj('Registro no encotrado','error');
		}
		if (!empty($this->request->data)){
			$this->ConfProvincia->begin();
			if ($this->ConfProvincia->save($this->request->data)) {
                $this->ConfProvincia->commit();
				msj('Registro Modificado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('/Pages/redirect');
			} else {
                $this->ConfProvincia->rollback();
				msj('Registro no modificado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->ConfProvincia),$this->ConfProvincia->validate));
		        $this->render('/Pages/error');
			}
		} else {
			$this->request->data = $this->ConfProvincia->read(null, $id);
		}
		$confPais = $this->ConfProvincia->ConfPai->find('list');
		$confDepartamentos = $this->ConfProvincia->ConfDepartamento->find('list');
		$this->set(compact('confPais', 'confDepartamentos'));
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
		$this->ConfProvincia->id = $id;
		if (!$this->ConfProvincia->exists()) {
			throw new NotFoundException(__('Invalid conf provincia'));
		}
		if ($this->ConfProvincia->delete()) {
			//$this->Session->setFlash(__('Conf provincia deleted'));
			$this->redirect(array('action'=>'index'));
		}
		//$this->Session->setFlash(__('Conf provincia was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	function select ($tipo=null,$id=null) {
        $this->layout='ajax';
        $this->set('id',$id);
        $this->set('tipo',$tipo);
        if($tipo==1){
        	$confDepartamentos = $this->ConfProvincia->ConfDepartamento->find('list',array('conditions'=>array('conf_pai_id'=>$id),'fields'=>array('id','denominacion')));
			$this->set(compact('confDepartamentos'));
        }
	}
}

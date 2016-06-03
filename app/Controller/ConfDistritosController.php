<?php
App::uses('AppController', 'Controller');
/**
 * ConfDistritos Controller
 *
 * @property ConfDistrito $ConfDistrito
 */
class ConfDistritosController extends AppController {

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
		$this->ConfDistrito->recursive = 0;
		$this->set('confDistritos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->ConfDistrito->id = $id;
		if (!$this->ConfDistrito->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('confDistrito', $this->ConfDistrito->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->ConfDistrito->create();
			$this->ConfDistrito->begin();
			if ($this->ConfDistrito->save($this->request->data)) {
                $this->ConfDistrito->commit();
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
			    $this->render('/Pages/redirect');
			} else {
                $this->ConfDistrito->rollback();
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->ConfDistrito),$this->ConfDistrito->validate));
				$this->render('/Pages/error');
			}
		}
		$confPais = $this->ConfDistrito->ConfPai->find('list');
//		$confDepartamentos = $this->ConfDistrito->ConfDepartamento->find('list');
//		$confProvincias = $this->ConfDistrito->ConfProvincia->find('list');
		$this->set(compact('confPais', 'confDepartamentos', 'confProvincias'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->ConfDistrito->id = $id;
		if (!$this->ConfDistrito->exists()) {
			msj('Registro no encotrado','error');
		}
		if (!empty($this->request->data)){
			$this->ConfDistrito->begin();
			if ($this->ConfDistrito->save($this->request->data)) {
                $this->ConfDistrito->commit();
				msj('Registro Modificado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('/Pages/redirect');
			} else {
                $this->ConfDistrito->rollback();
				msj('Registro no modificado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->ConfDistrito),$this->ConfDistrito->validate));
		        $this->render('/Pages/error');
			}
		} else {
			$this->request->data = $this->ConfDistrito->read(null, $id);
		}
		$confPais = $this->ConfDistrito->ConfPai->find('list');
		$confDepartamentos = $this->ConfDistrito->ConfDepartamento->find('list');
		$confProvincias = $this->ConfDistrito->ConfProvincia->find('list');
		$this->set(compact('confPais', 'confDepartamentos', 'confProvincias'));
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
		$this->ConfDistrito->id = $id;
		if (!$this->ConfDistrito->exists()) {
			throw new NotFoundException(__('Invalid conf distrito'));
		}
		if ($this->ConfDistrito->delete()) {
			//$this->Session->setFlash(__('Conf distrito deleted'));
			$this->redirect(array('action'=>'index'));
		}
		//$this->Session->setFlash(__('Conf distrito was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	function select ($tipo=null,$id=null) {
        $this->layout='ajax';
        $this->set('id',$id);
        $this->set('tipo',$tipo);
        if($tipo==1){
        	$confDepartamentos = $this->ConfDistrito->ConfDepartamento->find('list',array('conditions'=>array('conf_pai_id'=>$id),'fields'=>array('id','denominacion')));
			$this->set(compact('confDepartamentos'));
        }else{
        	$confProvincias = $this->ConfDistrito->ConfProvincia->find('list',array('conditions'=>array('conf_departamento_id'=>$id),'fields'=>array('id','denominacion')));
			$this->set(compact('confProvincias'));
        }
	}
}

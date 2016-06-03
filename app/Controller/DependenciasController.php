<?php
class DependenciasController extends AppController {

	var $name = 'Dependencias';
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html','Time');
    var $paginate = array('limit'=>50,'order'=>array('Dependencia.denominacion'=>'asc'));

    function beforeFilter(){
		$this->checkSession();
	}

	function index() {
		$this->layout='ajax';
		$this->Dependencia->recursive = 0;
		$var = array('institucion_id'=>$this->Session->read('INSTITUCION_ID'));
		$this->set('dependencias', $this->paginate($var));
	}

	function view($id = null) {
		$this->layout='ajax';
		if (!$id) {
            msj('Registro no encontrado','alerta');
			//$this->Session->setFlash(__('Invalid dependencia', true));
			//$this->redirect(array('action' => 'index'));
		}
		$this->set('dependencia', $this->Dependencia->read(null, $id));
	}

	function add() {
		$this->layout='ajax';
		if (!empty($this->data)) {
			$this->Dependencia->create();
			if ($this->Dependencia->save($this->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->data = null;
				//$this->Session->setFlash(__('The dependencia has been saved', true));
				//$this->redirect(array('action' => 'index'));
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				//$this->Session->setFlash(__('The dependencia could not be saved. Please, try again.', true));
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Dependencia),$this->Dependencia->validate));
		        $this->render('error');
			}
		}
		$institucions = $this->Dependencia->Institucion->find('list',array('conditions'=>array('id'=>$this->Session->read('INSTITUCION_ID')),'fields'=>array('id','denominacion')));
		$this->set(compact('institucions'));
	}

	function edit($id = null) {
		$this->layout='ajax';
		if (!$id && empty($this->data)) {
			msj('Registro no encotrado','error');
			$this->render('error');
//			$this->Session->setFlash(__('Invalid dependencia', true));
//			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Dependencia->save($this->data)) {
				msj('Registro Modificado Exitosamente','exito');
				$this->data = null;
//				$this->Session->setFlash(__('The dependencia has been saved', true));
//				$this->redirect(array('action' => 'index'));
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro no modificado','error');
//				$this->Session->setFlash(__('The dependencia could not be saved. Please, try again.', true));
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Dependencia),$this->Dependencia->validate));
		        $this->render('error');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Dependencia->read(null, $id);
		}
		$dependencias = $this->data;
		$institucions = $this->Dependencia->Institucion->find('list',array('conditions'=>array('id'=>$this->Session->read('INSTITUCION_ID')),'fields'=>array('id','denominacion')));
		$this->set(compact('institucions'));
		$this->set(compact('dependencias'));
	}

	function delete($id = null,$page=null) {
		$this->layout ="ajax";
		if (!$id) {
			$this->redirect(array('action'=>'index'));
		}
		$this->data['Dependencia']['id']     = $id;
		$this->data['Dependencia']['condicion_actividad'] = 0;
		if ($this->Dependencia->save($this->data)) {
			$this->redirect(array('action'=>'index'));
		}
		$this->redirect(array('action' => 'index'));
		$this->set('page',$page);
	}

	function activa($id = null,$page=null) {
		$this->layout ="ajax";
		if (!$id) {
			$this->redirect(array('action'=>'index'));
		}
		$this->data['Dependencia']['id']     = $id;
		$this->data['Dependencia']['condicion_actividad'] = 1;
		if ($this->Dependencia->save($this->data)) {
			$this->redirect(array('action'=>'index'));
		}
		$this->redirect(array('action' => 'index'));
		$this->set('page',$page);
	}
}
?>
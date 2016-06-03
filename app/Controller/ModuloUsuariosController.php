<?php

App::uses('AppController', 'Controller');

class ModuloUsuariosController extends AppController {

	var $name = 'ModuloUsuarios';
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html');
	var $uses = array('ModuloUsuario','Usuario');
    var $paginate = array('limit'=>50,'order'=>array('Usuario.usuario, Modulo.denominacion'=>'asc'));


    function beforeFilter(){
		$this->checkSession();
	}

	function index($inicio=null) {
		$this->layout ="ajax";

		$condicion = crear_busqueda_index($inicio,
                                          $data            = isset($this->request->data['ModuloUsuario'])?$this->request->data['ModuloUsuario']:array(),
                                          $campos_like     = array('Usuario.usuario',
                                                                   'Modulo.denominacion'
                                                                  ),
                                          $campo_radio     = null,
                                          $validacion_fija = array('Usuario.dependencia_id'=>$this->Session->read('DEPENDENCIA_ID'))
                                         );

		$this->ModuloUsuario->recursive = 1;
		$this->set('moduloUsuarios', $this->paginate($condicion));
	}

	function view($id = null) {
		if (!$id) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('moduloUsuario', $this->ModuloUsuario->read(null, $id));
	}

	function add() {
		$this->layout ="ajax";
		if (!empty($this->request->data)) {
			$this->ModuloUsuario->create();
			if ($this->ModuloUsuario->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->request->data = null;
			} else {
				msj('Registro No Guardado','error');
			}
		}
		$modulos = $this->ModuloUsuario->Modulo->find('list',array('fields'=>array('id','denominacion')));
		$this->set(compact('modulos'));
		$inst= $this->Session->read('INSTITUCION_ID');
		$usuarios = $this->Usuario->find('list',array('conditions'=>array('institucion_id'=>$inst, 'Usuario.dependencia_id'=>$this->Session->read('DEPENDENCIA_ID')),'fields'=>array('id','usuario')));
		$this->set(compact('usuarios'));
	}

	function edit($id = null) {
		$this->layout ="ajax";
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid modulo usuario', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->ModuloUsuario->save($this->request->data)) {
				msj('Registro Modificado Exitosamente','exito');
				$this->request->data = null;
			} else {
				msj('Registro No Modificado','error');
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->ModuloUsuario->read(null, $id);
		}
		$modulos = $this->ModuloUsuario->Modulo->find('list',array('fields'=>array('id','denominacion')));
		$this->set(compact('modulos'));
		$usuarios = $this->ModuloUsuario->Usuario->find('list',array('fields'=>array('id','usuario')));
		$this->set(compact('usuarios'));
	}

	function delete($id = null,$page=null) {
		$this->layout ="ajax";
		if (!$id) {
			$this->redirect(array('action'=>'index'));
		}
		$this->request->data['ModuloUsuario']['id']     = $id;
		$this->request->data['ModuloUsuario']['activo'] =0;
		if ($this->ModuloUsuario->save($this->request->data)) {
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
		$this->request->data['ModuloUsuario']['id']     = $id;
		$this->request->data['ModuloUsuario']['activo'] = 1;
		if ($this->ModuloUsuario->save($this->request->data)) {
			$this->redirect(array('action'=>'index'));
		}
		$this->redirect(array('action' => 'index'));
		$this->set('page',$page);
	}
}
?>
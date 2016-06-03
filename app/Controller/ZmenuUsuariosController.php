<?php
class ZmenuUsuariosController extends AppController {

	var $name = 'ZmenuUsuarios';
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html');
    var $paginate = array('limit'=>50,'order'=>array('Usuario.usuario, Modulo.denominacion, zmenu_id'=>'asc'));

	function beforeFilter(){
		$this->checkSession();
	}

	function index($inicio=null) {
		$this->layout='ajax';
		 $condicion = crear_busqueda_index($inicio,
                                          $data            = isset($this->request->data['ZmenuUsuario'])?$this->request->data['ZmenuUsuario']:array(),
                                          $campos_like     = array('Usuario.usuario',
                                                                   'Modulo.denominacion',
                                                                   'Zmenu.deno_menu'
                                                                  ),
                                          $campo_radio     = null,
                                          $validacion_fija = array('Usuario.dependencia_id'=>$this->Session->read('DEPENDENCIA_ID'))
                                         );
		$this->ZmenuUsuario->recursive = 0;
		$this->set('zmenuUsuarios', $this->paginate($condicion));
	}

	function view($id = null,$page = null) {
		$this->layout='ajax';
		if (!$id) {
			$this->flash(__('Invalid zmenu usuario', true), array('action' => 'index'));
		}
		$this->set('zmenuUsuario', $this->ZmenuUsuario->read(null, $id));

		$this->set('page',$page);
	}

	function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)) {
			$this->ZmenuUsuario->create();
			if ($this->ZmenuUsuario->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->request->data = null;
			} else {
			}
		}
		$dep = $this->Session->read('DEPENDENCIA_ID');
		$inst = $this->Session->read('INSTITUCION_ID');
		$usuarios = $this->ZmenuUsuario->Usuario->find('list',array('conditions'=>array('Usuario.dependencia_id'=>$this->Session->read('DEPENDENCIA_ID')),'fields'=>array('id','usuario')));
		$modulos = $this->ZmenuUsuario->Modulo->find('list',array('fields'=>array('id','denominacion')));
		$this->set(compact('usuarios', 'modulos'));
	}

	function edit($id = null,$page = null) {
		$this->layout='ajax';
		if (!$id && empty($this->request->data)) {
			$this->flash(sprintf(__('Invalid zmenu usuario', true)), array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->ZmenuUsuario->save($this->request->data)) {
				$this->flash(__('The zmenu usuario has been saved.', true), array('action' => 'index'));
			} else {
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->ZmenuUsuario->read(null, $id);
			$this->set('zmenuUsuario', $this->ZmenuUsuario->read(null, $id));
		}

		$dep = $this->Session->read('DEPENDENCIA_ID');
		$inst = $this->Session->read('INSTITUCION_ID');
		$DEPS = $this->ZmenuUsuario->Usuario->Dependencia->find('all',array('conditions'=>array('Dependencia.institucion_id'=>$inst),'fields'=>array('id')));
        foreach($DEPS as $dv){
             $vdep[] = $dv['Dependencia']['id'];
        }
		$usuarios = $this->ZmenuUsuario->Usuario->find('list',array('conditions'=>array('Usuario.dependencia_id'=>$vdep),'fields'=>array('id','usuario')));
		$zmenus = $this->ZmenuUsuario->Zmenu->find('list',array('fields'=>array('id','deno_menu')));
		$modulos = $this->ZmenuUsuario->Modulo->find('list',array('fields'=>array('id','denominacion')));
		$this->set(compact('zmenus', 'usuarios', 'modulos'));


	$this->set('page',$page);
	}


	function delete($id = null,$page=null) {
		$this->layout ="ajax";
		if (!$id) {
			$this->redirect(array('action'=>'index'));
		}
		$this->request->data['ZmenuUsuario']['id']     = $id;
		$this->request->data['ZmenuUsuario']['activo'] = 0;
		if ($this->ZmenuUsuario->save($this->request->data)) {
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
		$this->request->data['ZmenuUsuario']['id']     = $id;
		$this->request->data['ZmenuUsuario']['activo'] = 1;
		if ($this->ZmenuUsuario->save($this->request->data)) {
			$this->redirect(array('action'=>'index'));
		}
		$this->redirect(array('action' => 'index'));
		$this->set('page',$page);
	}

	function select_menu ($id=null) {
        $this->layout='ajax';
        $zmenus = $this->ZmenuUsuario->Zmenu->find('list',array('conditions'=>array('modulo_id'=>$id),'fields'=>array('id','deno_menu')));
        $this->set(compact('zmenus'));
	}
}
?>
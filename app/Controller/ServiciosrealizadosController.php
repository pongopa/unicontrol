<?php
App::uses('AppController', 'Controller');
/**
 * Serviciosrealizados Controller
 *
 * @property Serviciosrealizado $Serviciosrealizado
 */
class ServiciosrealizadosController extends AppController {
	var $paginate = array('limit'=>50);
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html');

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
		$this->layout='ajax';
		$this->Serviciosrealizado->recursive = 0;
		$this->set('serviciosrealizados', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Serviciosrealizado->id = $id;
		if (!$this->Serviciosrealizado->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('serviciosrealizado', $this->Serviciosrealizado->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Serviciosrealizado->create();
			if(!empty($this->request->data['Serviciosrealizado']['fecha_inicio'])){
				$this->request->data['Serviciosrealizado']['fecha_inicio'] = cambiar_formato_fecha($this->request->data['Serviciosrealizado']['fecha_inicio']);
			}
			if(!empty($this->request->data['Serviciosrealizado']['fecha_fin'])){
				$this->request->data['Serviciosrealizado']['fecha_fin'] = cambiar_formato_fecha($this->request->data['Serviciosrealizado']['fecha_fin']);
			}
			if ($this->Serviciosrealizado->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Serviciosrealizado),$this->Serviciosrealizado->validate));
		        $this->render('error');
			}
		}
		$clientes = $this->Serviciosrealizado->Cliente->find('list');
		$statuses = $this->Serviciosrealizado->Statuse->find('list');
		$usuarios = $this->Serviciosrealizado->Usuario->find('list');
		$this->set(compact('clientes', 'statuses', 'usuarios'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Serviciosrealizado->id = $id;
		if (!$this->Serviciosrealizado->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			if(!empty($this->request->data['Serviciosrealizado']['fecha_inicio'])){
				$this->request->data['Serviciosrealizado']['fecha_inicio'] = cambiar_formato_fecha($this->request->data['Serviciosrealizado']['fecha_inicio']);
			}
			if(!empty($this->request->data['Serviciosrealizado']['fecha_fin'])){
				$this->request->data['Serviciosrealizado']['fecha_fin'] = cambiar_formato_fecha($this->request->data['Serviciosrealizado']['fecha_fin']);
			}
			if ($this->Serviciosrealizado->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Serviciosrealizado),$this->Serviciosrealizado->validate));
				$this->render('error');
			}
		} else {
			$this->request->data = $this->Serviciosrealizado->read(null, $id);
		}
		$clientes = $this->Serviciosrealizado->Cliente->find('list');
		$statuses = $this->Serviciosrealizado->Statuse->find('list');
		$usuarios = $this->Serviciosrealizado->Usuario->find('list');
		$clientesvendedores = $this->Serviciosrealizado->Clientesvendedore->find('list',array('conditions'=>array('cliente_id'=>$this->request->data["Serviciosrealizado"]["cliente_id"]),'fields'=>array('id','nombres_y_apellidos')));
		$clientesucursas   = $this->Serviciosrealizado->Clientesucursa->find('list',array('conditions'=>array('cliente_id'=>$this->request->data["Serviciosrealizado"]["cliente_id"]),'fields'=>array('id','direccion')));
		$this->set(compact('clientes', 'statuses', 'usuarios','clientesvendedores', 'clientesucursas'));
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
		$this->Serviciosrealizado->id = $id;
		if (!$this->Serviciosrealizado->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Serviciosrealizado->delete()) {
//			$this->Session->setFlash(__('Serviciosrealizado deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Serviciosrealizado was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


	public function cliente($id = null) {
		$this->layout='ajax';
		$clientesvendedores = $this->Serviciosrealizado->Clientesvendedore->find('list',array('conditions'=>array('cliente_id'=>$id),'fields'=>array('id','nombres_y_apellidos')));
		$clientesucursas = $this->Serviciosrealizado->Clientesucursa->find('list',array('conditions'=>array('cliente_id'=>$id),'fields'=>array('id','direccion')));
		$this->set(compact('clientesvendedores', 'clientesucursas'));

	}

}

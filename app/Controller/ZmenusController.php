<?php
class ZmenusController extends AppController {

	var $name = 'Zmenus';
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html');
//    var $paginate = array('limit'=>10);
    var $paginate = array('limit'=>50,'order'=>array('Zmenu.modulo_id,Zmenu.nivel,Zmenu.orden_ubicacion'=>'ASC'));

	function beforeFilter(){
		$this->checkSession();
	}

	function index() {
		$this->layout='ajax';
		$this->Zmenu->recursive = 0;
		$this->set('zmenus', $this->paginate());
	}

	function view($id = null,$page = null) {
		$this->layout='ajax';
		if (!$id) {
            msj('Registro no encontrado','alerta');
			//$this->Session->setFlash(__('Invalid zmenu', true));
			//$this->redirect(array('action' => 'index'));
		}
		$this->set('zmenu', $this->Zmenu->read(null, $id));

		$this->set('page',$page);
	}

	function add() {
		$this->layout='ajax';
		//pr($this->params);
		if (!empty($this->request->data)) {
			$this->Zmenu->create();
			if ($this->Zmenu->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->request->data = null;
				//$this->Session->setFlash(__('The zmenu has been saved', true));
				//$this->redirect(array('action' => 'index'));
			} else {
				msj('Registro No Guardado','error');
				//$this->Session->setFlash(__('The zmenu could not be saved. Please, try again.', true));
			}
		}

		$dep = $this->Session->read('DEPENDENCIA_ID');
		$modulos = $this->Zmenu->Modulo->find('list',array('fields'=>array('id','denominacion')));
		$this->set(compact('modulos'));
	}

	function edit($id = null,$page = null) {
		$this->layout='ajax';
		if (!$id && empty($this->request->data)) {
			msj('Registro no encotrado','error');
		}
		if (!empty($this->request->data)) {
			if ($this->Zmenu->save($this->request->data)) {
				msj('Registro Modificado Exitosamente','exito');
				$this->request->data = null;
			} else {
				msj('Registro no modificado','error');
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Zmenu->read(null, $id);
			$this->set('zmenu', $this->Zmenu->read(null, $id));

			$zmenus = $this->Zmenu->find('list',array('conditions'=>array('modulo_id'=>$this->request->data['Zmenu']['modulo_id'],'url'=>'NULL'),'fields'=>array('id','deno_menu')));
            $this->set(compact('zmenus'));

            $modulos = $this->Zmenu->Modulo->find('list',array('fields'=>array('id','denominacion')));
		    $this->set(compact('modulos'));
		}

		$dep = $this->Session->read('DEPENDENCIA_ID');
		$this->set('page',$page);
	}

	function delete($id = null) {
		$this->layout='ajax';
		if (!$id) {
			//$this->Session->setFlash(__('Invalid id for zmenu', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Zmenu->delete($id)) {
			//$this->Session->setFlash(__('Zmenu deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		//$this->Session->setFlash(__('Zmenu was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	function select_menu ($id=null) {
        $this->layout='ajax';
        $zmenus = $this->Zmenu->find('list',array('conditions'=>array('modulo_id'=>$id,'url'=>'NULL'),'fields'=>array('id','deno_menu')));
        $this->set(compact('zmenus'));
	}

	function mostrar_nivel_orden ($id=null) {
        $this->layout='ajax';
        $zmenus = $this->Zmenu->find('all',array('conditions'=>array('id_menu'=>$id),'fields'=>array('orden_ubicacion'),'order'=>'orden_ubicacion DESC','limit'=>1));
        $orden = isset($zmenus[0]['Zmenu']['orden_ubicacion'])?($zmenus[0]['Zmenu']['orden_ubicacion']+1):1;
        $zmenus = $this->Zmenu->read(null, $id);
        $nivel = $zmenus['Zmenu']['nivel']+1;
        $this->set(compact('orden','nivel'));
	}

	function update_idcapa ($id=null) {
        $this->layout='ajax';
        if(isset($id) && up($id)=='NULL'){
        	$this->set('capa','NULL');
        	$this->set('url',up($id));
        }else{
            $this->set('capa','PRINCIPAL');
            //$this->set('url',$id);
        }

	}

}
?>
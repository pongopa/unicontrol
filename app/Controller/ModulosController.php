<?php
App::uses('AppController', 'Controller');
/**
 * Modulos Controller
 *
 * @property Modulo $Modulo
 */
class ModulosController extends AppController {

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
		$this->Modulo->recursive = 0;
		$this->set('modulos', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Modulo->id = $id;
		if (!$this->Modulo->exists()) {
			throw new NotFoundException(__('Invalid modulo'));
		}
		$this->set('modulo', $this->Modulo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Modulo->create();
			if ($this->Modulo->save($this->request->data)) {
				$this->Session->setFlash(__('The modulo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modulo could not be saved. Please, try again.'));
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
		$this->Modulo->id = $id;
		if (!$this->Modulo->exists()) {
			throw new NotFoundException(__('Invalid modulo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Modulo->save($this->request->data)) {
				$this->Session->setFlash(__('The modulo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modulo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Modulo->read(null, $id);
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
		$this->Modulo->id = $id;
		if (!$this->Modulo->exists()) {
			throw new NotFoundException(__('Invalid modulo'));
		}
		if ($this->Modulo->delete()) {
			$this->Session->setFlash(__('Modulo deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Modulo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * view_link method
 *
 * @param string $id
 * @return void
 */
	public function view_link() {
		$this->layout="modulos";
		$this->set('modulos',$this->Modulo->ModuloUsuario->find('all',array('conditions'=>array('ModuloUsuario.activo'=>1,'ModuloUsuario.usuario_id'=>$this->Session->read('USUARIO_ID')),'order'=>array('Modulo.id'=>'ASC'))));
	}//end index


/**
 * salir_programa method
 *
 * @param string $id
 * @return void
 */
	public function salir_programa () {
		$this->Session->delete('ANO_BUSQUEDA');
		$modulo_id = $this->Session->read('modulo_id');
//		$this->redirect(array('action' => '/modulo/'.$modulo_id));

	}

	public function salir_programa_ajax () {
		$this->layout="ajax";
		$this->Session->delete('ANO_BUSQUEDA');

	}


/**
 * modulo method
 *
 * @param string $id
 * @return void
 */
	public function modulo ($modulo_id=null,$msj=null) {
		$this->layout="default";
		$this->set('modulos',$this->Modulo->ModuloUsuario->find('all',array('conditions'=>array('ModuloUsuario.activo'=>1,'ModuloUsuario.usuario_id'=>$this->Session->read('USUARIO_ID')),'order'=>array('Modulo.id'=>'ASC'))));
		$select_modulo = $modulo_id;
		$this->Session->write('modulo_id',$modulo_id);
	    $NIVEL1=$this->Modulo->ZmenuUsuario->find('all',array('conditions'=>array('Zmenu.nivel'=>1,'ZmenuUsuario.modulo_id'=>$modulo_id,'ZmenuUsuario.activo'=>1,'ZmenuUsuario.usuario_id'=>$this->Session->read('USUARIO_ID')),'order'=>array('Zmenu.orden_ubicacion'=>'ASC')));
	    $this->set('NIVEL1',$NIVEL1);
	    $NIVEL2 = array();
	    $NIVEL3 = array();
	    $NIVEL4 = array();
	    $NIVEL5 = array();
	    $NIVEL6 = array();
	    $NIVEL7 = array();
	    $NIVEL8 = array();
	    foreach($NIVEL1 as $n1){
	    	$NIVEL2[$n1['Zmenu']['id']]=$this->Modulo->ZmenuUsuario->find('all',  array('conditions'=>array('Zmenu.nivel'=>2,'Zmenu.id_menu'=>$n1['Zmenu']['id'],'ZmenuUsuario.modulo_id'=>$modulo_id,'ZmenuUsuario.activo'=>1,'ZmenuUsuario.usuario_id'=>$this->Session->read('USUARIO_ID')),'order'=>array('Zmenu.orden_ubicacion'=>'ASC')));
	    	$NIVEL2c                   =$this->Modulo->ZmenuUsuario->find('count',array('conditions'=>array('Zmenu.nivel'=>2,'Zmenu.id_menu'=>$n1['Zmenu']['id'],'ZmenuUsuario.modulo_id'=>$modulo_id,'ZmenuUsuario.activo'=>1,'ZmenuUsuario.usuario_id'=>$this->Session->read('USUARIO_ID'))));
	        if($NIVEL2c!=0){
				foreach($NIVEL2[$n1['Zmenu']['id']] as $n2){
					$NIVEL3[$n2['Zmenu']['id']]=$this->Modulo->ZmenuUsuario->find('all',  array('conditions'=>array('Zmenu.nivel'=>3,'Zmenu.id_menu'=>$n2['Zmenu']['id'],'ZmenuUsuario.modulo_id'=>$modulo_id,'ZmenuUsuario.activo'=>1,'ZmenuUsuario.usuario_id'=>$this->Session->read('USUARIO_ID')),'order'=>array('Zmenu.orden_ubicacion'=>'ASC')));
	    			$NIVEL3c                   =$this->Modulo->ZmenuUsuario->find('count',array('conditions'=>array('Zmenu.nivel'=>3,'Zmenu.id_menu'=>$n2['Zmenu']['id'],'ZmenuUsuario.modulo_id'=>$modulo_id,'ZmenuUsuario.activo'=>1,'ZmenuUsuario.usuario_id'=>$this->Session->read('USUARIO_ID'))));
		            if($NIVEL3c!=0){
						foreach($NIVEL3[$n2['Zmenu']['id']] as $n3){
							$NIVEL4[$n3['Zmenu']['id']]=$this->Modulo->ZmenuUsuario->find('all',  array('conditions'=>array('Zmenu.nivel'=>4,'Zmenu.id_menu'=>$n3['Zmenu']['id'],'ZmenuUsuario.modulo_id'=>$modulo_id,'ZmenuUsuario.activo'=>1,'ZmenuUsuario.usuario_id'=>$this->Session->read('USUARIO_ID')),'order'=>array('Zmenu.orden_ubicacion'=>'ASC')));
	    					$NIVEL4c                   =$this->Modulo->ZmenuUsuario->find('count',array('conditions'=>array('Zmenu.nivel'=>4,'Zmenu.id_menu'=>$n3['Zmenu']['id'],'ZmenuUsuario.modulo_id'=>$modulo_id,'ZmenuUsuario.activo'=>1,'ZmenuUsuario.usuario_id'=>$this->Session->read('USUARIO_ID'))));
			                if($NIVEL4c!=0){
								foreach($NIVEL4[$n3['Zmenu']['id']] as $n4){
									$NIVEL5[$n4['Zmenu']['id']]=$this->Modulo->ZmenuUsuario->find('all',  array('conditions'=>array('Zmenu.nivel'=>5,'Zmenu.id_menu'=>$n4['Zmenu']['id'],'ZmenuUsuario.modulo_id'=>$modulo_id,'ZmenuUsuario.activo'=>1,'ZmenuUsuario.usuario_id'=>$this->Session->read('USUARIO_ID')),'order'=>array('Zmenu.orden_ubicacion'=>'ASC')));
	    							$NIVEL5c                   =$this->Modulo->ZmenuUsuario->find('count',array('conditions'=>array('Zmenu.nivel'=>5,'Zmenu.id_menu'=>$n4['Zmenu']['id'],'ZmenuUsuario.modulo_id'=>$modulo_id,'ZmenuUsuario.activo'=>1,'ZmenuUsuario.usuario_id'=>$this->Session->read('USUARIO_ID'))));
									if($NIVEL5c!=0){
										foreach($NIVEL5[$n4['Zmenu']['id']] as $n5){
											$NIVEL6[$n5['Zmenu']['id']]=$this->Modulo->ZmenuUsuario->find('all',  array('conditions'=>array('Zmenu.nivel'=>6,'Zmenu.id_menu'=>$n5['Zmenu']['id'],'ZmenuUsuario.modulo_id'=>$modulo_id,'ZmenuUsuario.activo'=>1,'ZmenuUsuario.usuario_id'=>$this->Session->read('USUARIO_ID')),'order'=>array('Zmenu.orden_ubicacion'=>'ASC')));
	    									$NIVEL6c                   =$this->Modulo->ZmenuUsuario->find('count',array('conditions'=>array('Zmenu.nivel'=>6,'Zmenu.id_menu'=>$n5['Zmenu']['id'],'ZmenuUsuario.modulo_id'=>$modulo_id,'ZmenuUsuario.activo'=>1,'ZmenuUsuario.usuario_id'=>$this->Session->read('USUARIO_ID'))));
											if($NIVEL6c!=0){
												foreach($NIVEL6[$n5['Zmenu']['id']] as $n6){
													$NIVEL7[$n6['Zmenu']['id']]=$this->Modulo->ZmenuUsuario->find('all',  array('conditions'=>array('Zmenu.nivel'=>7,'Zmenu.id_menu'=>$n6['Zmenu']['id'],'ZmenuUsuario.modulo_id'=>$modulo_id,'ZmenuUsuario.activo'=>1,'ZmenuUsuario.usuario_id'=>$this->Session->read('USUARIO_ID')),'order'=>array('Zmenu.orden_ubicacion'=>'ASC')));
	    											$NIVEL7c                   =$this->Modulo->ZmenuUsuario->find('count',array('conditions'=>array('Zmenu.nivel'=>7,'Zmenu.id_menu'=>$n6['Zmenu']['id'],'ZmenuUsuario.modulo_id'=>$modulo_id,'ZmenuUsuario.activo'=>1,'ZmenuUsuario.usuario_id'=>$this->Session->read('USUARIO_ID'))));
													if($NIVEL7c!=0){
														foreach($NIVEL7[$n6['Zmenu']['id']] as $n7){
															$NIVEL8[$n7['Zmenu']['id']]=$this->Modulo->ZmenuUsuario->find('all',  array('conditions'=>array('Zmenu.nivel'=>8,'Zmenu.id_menu'=>$n7['Zmenu']['id'],'ZmenuUsuario.modulo_id'=>$modulo_id,'ZmenuUsuario.activo'=>1,'ZmenuUsuario.usuario_id'=>$this->Session->read('USUARIO_ID')),'order'=>array('Zmenu.orden_ubicacion'=>'ASC')));
	    													$NIVEL8c                   =$this->Modulo->ZmenuUsuario->find('count',array('conditions'=>array('Zmenu.nivel'=>8,'Zmenu.id_menu'=>$n7['Zmenu']['id'],'ZmenuUsuario.modulo_id'=>$modulo_id,'ZmenuUsuario.activo'=>1,'ZmenuUsuario.usuario_id'=>$this->Session->read('USUARIO_ID'))));
															//$NIVEL8[$n7[0]['id']]=$this->modulos->execute("SELECT * FROM zmenu WHERE modulo='$select_modulo' AND nivel=8  and activo=1 AND id_menu=".$n7[0]['id']."  ORDER BY orden_ubicacion ASC");
															//$NIVEL8c=$this->modulos->execute("SELECT count(*) as c FROM zmenu WHERE modulo='$select_modulo' AND nivel=8  and activo=1 AND id_menu=".$n7[0]['id']."");


														}//nivel7
									                }//if7
												}//nivel6
							                }//if6
										}//nivel5
					                }//if5
								}//nivel4
			                }//if4
						}//nivel3
		            }//if3
				}//nivel2
	        }//if2
	    }//nivel1
	    $this->set('NIVEL2',$NIVEL2);
	    $this->set('NIVEL3',$NIVEL3);
	    $this->set('NIVEL4',$NIVEL4);
	    $this->set('NIVEL5',$NIVEL5);
	    $this->set('NIVEL6',$NIVEL6);
	    $this->set('NIVEL7',$NIVEL7);
	    $this->set('NIVEL8',$NIVEL8);
	    if(isset($msj) && $msj!=null){
	    	$x=$this->Modulo->read('denominacion',$modulo_id);
	    	$deno = $x['Modulo']['denominacion'];
	    	$this->set('msj',$deno);
	    }
	}//end modulos
}

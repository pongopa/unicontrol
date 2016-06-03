<?php
class ConfUsuariosController extends AppController {

	var $name = 'ConfUsuarios';
	var $uses = array('Usuario','Modulo','ModuloUsuario','ZmenuUsuario','Zmenu');
    var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html');
    var $paginate = array('limit'=>50, 'order'=>array('Dependencia.denominacion, Usuario.usuario'=>'asc'));

   function beforeFilter(){
		$this->checkSession();
	}

	function index($id=null, $inicio=null) {
		$this->layout ="ajax";
		$this->Usuario->recursive = 0;
		if(isset($id) && $id!=null && $id!="no"){
			$this->Session->write('conf_nivel',$id);
		}
	    if($this->Session->read('conf_nivel')==1){
	     	$con = array('nivel'=>1,'Dependencia.institucion_id'=>$this->Session->read('INSTITUCION_ID'));
        }else{
        	$con = array('nivel'=>2,'Dependencia.institucion_id'=>$this->Session->read('INSTITUCION_ID'), 'Usuario.dependencia_id'=>$this->Session->read('DEPENDENCIA_ID'));
        }

        $condicion = crear_busqueda_index($inicio,
                                          $data            = isset($this->request->data['ConfUsuario'])?$this->request->data['ConfUsuario']:array(),
                                          $campos_like     = array('Dependencia.denominacion',
                                                                   'Usuario.usuario'
                                                                  ),
                                          $campo_radio     = null,
                                          $validacion_fija = $con
                                         );
        $this->set('nivel',$id);
        $this->set('usuarios', $this->paginate($condicion));
	}

	function view($id = null,$page=null) {
		$this->layout ="ajax";
		if (!$id) {
			msj('Registro no encontrado','alerta');
		}
		$this->set('usuario', $this->Usuario->read(null, $id));

		$this->set('page',$page);
	}

	function add($id=null) {
		$this->layout ="ajax";
		if(isset($id) && $id!=null){
			$this->Session->write('conf_nivel',$id);
		}
		if (!empty($this->request->data)) {
            $this->Usuario->create();
			$this->request->data['Usuario']['usuario'] = trim(up($this->request->data['Usuario']['usuario']));
			if(!empty($this->request->data['Usuario']['clave'])){
				$this->request->data['Usuario']['clave'] = up(md5(trim(up($this->request->data['Usuario']['clave']))));
			}

			$this->request->data['Usuario']['nivel'] = $this->Session->read('conf_nivel');
            if($this->Session->read('conf_nivel')==2){
                $this->request->data['Usuario']['dependencia_id']      = $this->Session->read('DEPENDENCIA_ID');
                if($this->Session->read('NIVEL_DEPENDENCIA')==2){
                $this->request->data['Usuario']['dependencia_orig_id'] = $this->request->data['Usuario']['dependencia_id'];
                }
            }else{
            	$this->request->data['Usuario']['dependencia_orig_id'] = $this->request->data['Usuario']['dependencia_id'];
            }
			if ($this->Usuario->save($this->request->data)) {
                $id_usuario = $this->Usuario->id;
				    if($this->Session->read('conf_nivel')==1){
								$mod = $this->Modulo->find('all');
								foreach($mod as $md){
									$this->ModuloUsuario->create();
									$id_modulo = $md['Modulo']['id'];
									$this->request->data['ModuloUsuario']['modulo_id'] = $id_modulo;
									$this->request->data['ModuloUsuario']['usuario_id'] = $id_usuario;
									$this->request->data['ModuloUsuario']['activo'] = true;
									$this->ModuloUsuario->save($this->request->data);
									$ff = $this->ModuloUsuario->getAffectedRows();
									//pr($ff);
									$this->request->data = null;
								}
								$menu = $this->Zmenu->find('all', array('conditions'=>array('principal'=>0)));
								foreach($menu as $me){
									$this->ZmenuUsuario->create();
									$id_modulo = $me['Zmenu']['modulo_id'];
									$id_mmenu = $me['Zmenu']['id'];
									$this->request->data['ZmenuUsuario']['zmenu_id'] = $id_mmenu;
									$this->request->data['ZmenuUsuario']['modulo_id'] = $id_modulo;
									$this->request->data['ZmenuUsuario']['usuario_id'] = $id_usuario;
									$this->request->data['ZmenuUsuario']['activo'] = true;
									$this->ZmenuUsuario->save($this->request->data);
									$ff = $this->ZmenuUsuario->getAffectedRows();
									//pr($ff);
									$this->request->data = null;
								}
				    }else{
				    	        $menu = $this->Zmenu->find('all', array('conditions'=>array('principal'=>0, 'principal_dependencia'=>0)));
								foreach($menu as $me){
									$this->ZmenuUsuario->create();
									$id_modulo = $me['Zmenu']['modulo_id'];
									$id_mmenu = $me['Zmenu']['id'];
									$this->request->data['ZmenuUsuario']['zmenu_id'] = $id_mmenu;
									$this->request->data['ZmenuUsuario']['modulo_id'] = $id_modulo;
									$this->request->data['ZmenuUsuario']['usuario_id'] = $id_usuario;
									$this->request->data['ZmenuUsuario']['activo'] = true;
									$this->ZmenuUsuario->save($this->request->data);
									$ff = $this->ZmenuUsuario->getAffectedRows();
									//pr($ff);
									$this->request->data = null;
								}
				    }

				msj('Registro Guardado Exitosamente','exito');
				$this->request->data = null;
				//$this->Session->setFlash(__('The modulo usuario has been saved', true));
				//$this->redirect(array('action' => 'index'));
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				//$this->Session->setFlash(__('The modulo usuario could not be saved. Please, try again.', true));
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Usuario),$this->Usuario->validate));
		        $this->render('error');
			}
		}
		$dependencias = $this->Usuario->Dependencia->find('list',array('conditions'=>array('institucion_id'=>$this->Session->read('INSTITUCION_ID')),'fields'=>array('id','denominacion')));
		$areas  = $this->Usuario->Area->find('list',array('fields'=>array('id','denominacion')));
		$cargos = $this->Usuario->Cargo->find('list',array('fields'=>array('id','denominacion')));
		$this->set(compact('dependencias', 'areas','cargos'));
		//$this->render('add');
	}

	function edit($id = null,$page=null) {
		$this->layout ="ajax";
		if (!$id && empty($this->request->data)) {
			$this->redirect(array('action' => 'index'));
			$this->render('error');
		}
		if (!empty($this->request->data)) {
			/*if($this->request->data['Usuario']['clave']!=''){
                $this->request->data['Usuario']['clave'] = md5(trim(up($this->request->data['Usuario']['clave'])));
			}*/

			if ($this->Usuario->save($this->request->data)) {
				msj('Registro Modificado Exitosamente','exito');
				$this->request->data = null;
				$this->set('URL',"/".$this->name."/add");
	            $this->render('redirect');
			} else {
				msj('Registro No Modificado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Usuario),$this->Usuario->validate));
		        $this->render('error');
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Usuario->read(null, $id);
			$this->set('usuario', $this->Usuario->read(null, $id));
		}
		$dependencias = $this->Usuario->Dependencia->find('list',array('conditions'=>array('institucion_id'=>$this->Session->read('INSTITUCION_ID')),'fields'=>array('id','denominacion')));
		$areas  = $this->Usuario->Area->find('list',array('fields'=>array('id','denominacion')));
		$cargos = $this->Usuario->Cargo->find('list',array('fields'=>array('id','denominacion')));
		$this->set(compact('dependencias', 'areas','cargos'));
		$this->set('page',$page);
	}

	function delete($id = null,$page=null) {
		$this->layout ="ajax";
		if (!$id) {
			$this->redirect(array('action'=>'index'));
		}
		$this->request->data['Usuario']['id']     = $id;
		$this->request->data['Usuario']['activo'] = 0;
		if ($this->Usuario->save($this->request->data)) {
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
		$this->request->data['Usuario']['id']     = $id;
		$this->request->data['Usuario']['activo'] = 1;
		if ($this->Usuario->save($this->request->data)) {
			$this->redirect(array('action'=>'index'));
		}
		$this->redirect(array('action' => 'index'));
		$this->set('page',$page);
	}



	function cambiar_clave () {
		$this->layout ="ajax";
		$usuario = $this->Session->read('USUARIO');
		$usuario_id = $this->Session->read('USUARIO_ID');
		$this->set('USUARIO',$usuario);

		if (!empty($this->request->data)) {
			$this->set('form_mostrar',false);
			if($this->request->data['Usuario']['clave_actual']!=''){
				if($this->request->data['Usuario']['clave_nueva']!=''){
					if($this->request->data['Usuario']['clave_nueva']==$this->request->data['Usuario']['clave_nueva2']){
						$data = $this->Usuario->read('clave',$usuario_id);
						if(up(md5(trim($this->request->data['Usuario']['clave_actual'])))==$data['Usuario']['clave']){
							$this->request->data['Usuario']['id']    = $usuario_id;
							$this->request->data['Usuario']['clave'] = up(md5(trim($this->request->data['Usuario']['clave_nueva'])));
							$var = $this->Usuario->query("UPDATE usuarios SET clave='".$this->request->data['Usuario']['clave']."' WHERE id='".$usuario_id."'; ");
									if ($var>1) {
										msj('Clave Modificada Exitosamente','exito');
										$this->request->data = null;
										$this->set('URL',"/".$this->name."/cambiar_clave");
							            $this->render('redirect');
									} else {
										msj('Clave No Modificada','error');
										$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Usuario),$this->Usuario->validate));
								        $this->render('error');
									}
						}else{
							msj('La Clave Actual indicada no es correcta, verifique','error');
						}
					}else{
						msj('La Clave Nueva y la de confirmar no coinciden, verifique','error');
					}
				}else{
					msj('Ingrese la Clave Nueva','error');
				}
			}else{
				msj('Ingrese la Clave Actual','error');
			}
		}
	}//fin cambiar_clave () {









}
?>
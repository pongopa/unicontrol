<?php
App::uses('AppController', 'Controller');
/**
 * Ordencompras Controller
 *
 * @property Ordencompra $Ordencompra
 */
class OrdencomprasController extends AppController {
	var $paginate = array('limit'=>50);
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html', 'Productos', 'OrdenCompra');

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
		$this->Ordencompra->recursive = 0;
		$this->set('ordencompras', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='ajax';
		$this->Ordencompra->id = $id;
		if (!$this->Ordencompra->exists()) {
			msj('Registro no encontrado','alerta');
		}
		$this->Ordencompra->recursive = 3;
		$this->set('ordencompra', $this->Ordencompra->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout='ajax';
		if (!empty($this->request->data)){
			$this->Ordencompra->create();
			$this->Ordencompra->begin();
            if(!empty($this->request->data['Ordencompra']['fecha_orden_compra'])){
				$this->request->data['Ordencompra']['fecha_orden_compra'] = cambiar_formato_fecha($this->request->data['Ordencompra']['fecha_orden_compra']);
			}
			if ($this->Ordencompra->save($this->request->data)) {
                $contar    = 0;
			    $inicio    = 0;
			    $i2        = 0;
                $Productos = $this->Session->read("Productos");
				$id_compra = $this->Ordencompra->id;
				if(isset($Productos)){
					 foreach($Productos as $Producto){
					 	  $Producto['id2'] = $i2;
	                      $i2++;
					      if($Producto['condicion']==1){
				      	       $this->request->data['Ordencomprasproducto']['ordencompra_id']    = $id_compra;
				      	       $this->request->data['Ordencomprasproducto']['producto_id']       = $Producto["codigo"];
							   $this->request->data['Ordencomprasproducto']['cantidad']          = $Producto["cantidad"];
							   $this->request->data['Ordencomprasproducto']['precio_unitario']   = $Producto["precio_unitario"];
							   $this->Ordencompra->Ordencomprasproducto->create();
							   if ($this->Ordencompra->Ordencomprasproducto->save($this->request->data)) {
									$inicio++;
								} else {
									$contar++;
								}
                          }//fin if
					  }//fin foreach
				}//fin if
				if($contar==0 && $inicio!=0) {
					            $this->Ordencompra->commit();
								msj('Registro Guardado Exitosamente','exito');
								$this->set('URL',"/".$this->name."/add");
					            $this->render('redirect');
				}else{
					            $this->Ordencompra->rollback();
								msj('Registro No Guardado','error');
								$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Ordencompra),$this->Ordencompra->validate));
						        $this->render('error');
				}
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Ordencompra),$this->Ordencompra->validate));
		        $this->render('error');
			}
		}
		$ordencomprastipos = $this->Ordencompra->Ordencomprastipo->find('list');
		$serviciosrealizados = $this->Ordencompra->Serviciosrealizado->find('list');
		$proveedores = $this->Ordencompra->Proveedore->find('list');
		$area = $this->Session->read("USUARIO_AREA");
		$areas = $this->Ordencompra->Area->find('list',array('conditions'=>array('id'=>$area)));
		$condicionpagos = $this->Ordencompra->Condicionpago->find('list');
		$formapagos = $this->Ordencompra->Formapago->find('list');
		$formaentregas = $this->Ordencompra->Formaentrega->find('list');
		$administradores = $this->Ordencompra->Administrador->find('list',array('conditions'=>array('cargo_id'=>1)));
		$proveedoresvendedores = array();
		$proveedoresbancos = array();
		$gridps = array();
		$this->set(compact('administradores','formapagos','formaentregas','condicionpagos','areas','ordencomprastipos', 'serviciosrealizados', 'proveedores', 'proveedoresvendedores', 'proveedoresbancos', 'gridps'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout='ajax';
		$this->Ordencompra->id = $id;
		if (!$this->Ordencompra->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if (!empty($this->request->data)){
			if(!empty($this->request->data['Ordencompra']['fecha_orden_compra'])){
				$this->request->data['Ordencompra']['fecha_orden_compra'] = cambiar_formato_fecha($this->request->data['Ordencompra']['fecha_orden_compra']);
			}
			if ($this->Ordencompra->save($this->request->data)) {
				msj('Registro Guardado Exitosamente','exito');
				$this->set('URL',"/".$this->name."/");
	            $this->render('redirect');
			} else {
				msj('Registro No Guardado','error');
				$this->set('contenido_errores',retornar_errores_ventana ($this->validateErrors($this->Ordencompra),$this->Ordencompra->validate));
		        $this->render('error');
			}
		} else {
			$this->request->data = $this->Ordencompra->read(null, $id);
		}

		$proveedoresvendedores2 = $this->Ordencompra->Proveedoresvendedore->find('all', array('conditions'=>array('proveedore_id'=>$this->request->data["Ordencompra"]["proveedore_id"])));
        $this->set(compact('proveedoresvendedores2'));

        $serviciosrealizados2 = $this->Ordencompra->Serviciosrealizado->find('all', array('conditions'=>array('Serviciosrealizado.id'=>$this->request->data["Ordencompra"]["serviciosrealizado_id"])));
        $this->set(compact('serviciosrealizados2'));

        $proveedores2 = $this->Ordencompra->Proveedore->read(null, $this->request->data["Ordencompra"]["proveedore_id"]);
		$this->set(compact('proveedores2'));

        $this->set("porcentaje_igv",$this->request->data["Ordencompra"]["porcentaje_igv"]);
		$this->Ordencompra->Ordencomprasproducto->recursive = 2;
		$this->set('ordencompra', $this->Ordencompra->Ordencomprasproducto->find('all', array('conditions'=>array('ordencompra_id'=>$id))));
		$ordencomprastipos = $this->Ordencompra->Ordencomprastipo->find('list');
		$serviciosrealizados = $this->Ordencompra->Serviciosrealizado->find('list');
		$proveedores = $this->Ordencompra->Proveedore->find('list');
		$area = $this->Session->read("USUARIO_AREA");
		$areas = $this->Ordencompra->Area->find('list',array('conditions'=>array('id'=>$area)));
		$condicionpagos = $this->Ordencompra->Condicionpago->find('list');
		$formapagos = $this->Ordencompra->Formapago->find('list');
		$formaentregas = $this->Ordencompra->Formaentrega->find('list');
		$administradores = $this->Ordencompra->Administrador->find('list',array('conditions'=>array('cargo_id'=>1)));
		$proveedoresvendedores = $this->Ordencompra->Proveedoresvendedore->find('list',array('conditions'=>array('proveedore_id'=>$this->request->data["Ordencompra"]["proveedore_id"]),'fields'=>array('id','nombres_y_apellidos')));
		$proveedoresbancos = $this->Ordencompra->Proveedoresbanco->find('list',array('conditions'=>array('proveedore_id'=>$this->request->data["Ordencompra"]["proveedore_id"]),'fields'=>array('id','cuenta_full')));
		$this->set(compact('administradores','formapagos','formaentregas','condicionpagos','areas','ordencomprastipos', 'serviciosrealizados', 'proveedores', 'proveedoresvendedores', 'proveedoresbancos'));
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
		$this->Ordencompra->id = $id;
		if (!$this->Ordencompra->exists()) {
			msj('Registro no encontrado','alerta');
		}
		if ($this->Ordencompra->delete()) {
//			$this->Session->setFlash(__('Ordencompra deleted'));
			$this->redirect(array('action'=>'index'));
		}
//		$this->Session->setFlash(__('Ordencompra was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


	public function select_pro($id=null){
		$this->layout='ajax';
		$proveedoresvendedores = $this->Ordencompra->Proveedoresvendedore->find('list',array('conditions'=>array('proveedore_id'=>$id),'fields'=>array('id','nombres_y_apellidos')));
		$this->set(compact('proveedoresvendedores'));
		$proveedoresbancos = $this->Ordencompra->Proveedoresbanco->find('list',array('conditions'=>array('proveedore_id'=>$id),'fields'=>array('id','cuenta_full')));
		$this->set(compact('proveedoresbancos'));
//		$this->Ordencompra->Proveedore->recursive = 3;
		$proveedores = $this->Ordencompra->Proveedore->read(null, $id);
		$this->set(compact('proveedores'));
	}
	function select_contacto($id=null){
		$this->layout='ajax';
        $proveedoresvendedores = $this->Ordencompra->Proveedoresvendedore->read(null, $id);
        $this->set(compact('proveedoresvendedores'));
	}
	function select_serv($id=null){
		$this->layout='ajax';
        $serviciosrealizados = $this->Ordencompra->Serviciosrealizado->read(null, $id);
        $this->set(compact('serviciosrealizados'));
	}

	function select_tipo_orden($id=null){
		$this->layout='ajax';
		$this->Session->write("TipoOrden",$id);
	}
}

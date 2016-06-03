<?php
class ComponenteOrdenCompraController extends AppController {

	var $name = 'ComponenteOrdenCompra';
	var $uses = array('Producto', 'Productosmedida', 'Productotipo', 'Banco', 'Moneda', 'Rubro', 'Proveedore');
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html', 'Proveedor');
    var $paginate = array('limit'=>50);

	function beforeFilter(){
		$this->checkSession();
	}
	function buscar_proveedor($pista = null){
    	$this->layout='ajax';
    	if($pista!=null){
            $this->Session->write("pista", $pista);
    	}else{
    		$pista = $this->Session->read("pista");
    	}
    	$condicion[]        = busca_separado(array('Proveedore.razon_social', 'Proveedore.nombre_comercial', 'Proveedore.ruc'),$pista);
    	$this->Proveedore->recursive = 1;
    	$this->set('Proveedores', $this->paginate('Proveedore',$condicion));
    }//fin function
    function seleccion_proveedor($id=null){
	  $this->layout = 'ajax';
	  $this->Rubro->recursive = 2;
	  $this->set('Proveedores', $this->Proveedore->read(null, $id));



	}//fin function
}//fin class
?>
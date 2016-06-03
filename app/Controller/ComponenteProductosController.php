<?php
class ComponenteProductosController extends AppController {

	var $name = 'ComponenteProductos';
	var $uses = array('Producto', 'Productosmedida', 'Productotipo');
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html', 'Productos');
    var $paginate = array('limit'=>50);

	function beforeFilter(){
		$this->checkSession();
	}

	function buscar($pista = null){
    	$this->layout='ajax';
    	if($pista!=null){
            $this->Session->write("pista", $pista);
    	}else{
    		$pista = $this->Session->read("pista");
    	}
    	$TipoOrden = $this->Session->read("TipoOrden");
    	if($TipoOrden==2){
            $sql = "and Producto.clasificacion=2";
    	}else{
    		$sql="";
    	}
    	$condicion[]        = busca_separado(array('Producto.denominacion'),$pista).$sql;
    	$this->Producto->recursive = 1;
    	$this->set('CatalogoProductos', $this->paginate($condicion));
    }//fin function
	function add(){
	    $this->layout='ajax';
	    $Productos  = $this->Session->read("Productos");
	    if(!empty($this->data['ComponenteProducto']['codigo'])){
		             if(!empty($this->data['ComponenteProducto']['cantidad'])){
		             	$est=false;
		            	if(isset($Productos)){
						   foreach($Productos as $Producto2){
								if($Producto2["codigo"]==$this->data['ComponenteProducto']['codigo'] && $Producto2["condicion"]==1){
		                              $est=true;
		                              break;
		            	         }else{
		            	          	  $est=false;
		            	         }
						    }//fin foreach
						 }else{
		            	   $est=false;
		            	 }//fin else
		            	         if($est==false){
		            	         	$Producto["id"]                    = 0;
		            	         	$Producto["codigo"]                = $this->data['ComponenteProducto']['codigo'];
									$Producto["unidad_medida"]         = $this->data['ComponenteProducto']['unidad_medida'];
									$Producto["denominacion"]          = $this->data['ComponenteProducto']['denominacion'];
									$Producto["cantidad"]              = Formato_cantidad($this->data['ComponenteProducto']['cantidad'],1);
									$Producto["precio_unitario"]       = Formato($this->data['ComponenteProducto']['precio_unitario'],1,3);
	                                $Producto["condicion"]             = 1;
	                                $Producto["inicio"]                = 2;
	                                $Productos[] = $Producto;
	                             }else{
	                            	msj('El producto ya se encuentra en la lista','error');
	                             }
			}else{
		              msj('FALTAN DATOS','error');
			     }
		}else{
	              msj('FALTAN DATOS','error');
		     }
	    $this->Session->write("Productos",$Productos);
	}//fin function
	function delete($id=null){
        $this->layout='ajax';
        $Productos  = $this->Session->read("Productos");
        $Productos[$id]["condicion"] = 2;
        $this->Session->write("Productos",$Productos);
        $this->render("add");
	}
	function seleccion_producto($id=null){
	  $this->layout = 'ajax';
	  $this->Producto->recursive = 2;
	  $this->set('CatalogoProductos', $this->Producto->read(null, $id));
	}//fin function


    function buscar_req($pista = null){
    	$this->layout='ajax';
    	if($pista!=null){
            $this->Session->write("pista", $pista);
    	}else{
    		$pista = $this->Session->read("pista");
    	}
    	$condicion[]        = busca_separado(array('Producto.denominacion'),$pista);
    	$this->Producto->recursive = 1;
    	$this->set('CatalogoProductos', $this->paginate($condicion));
    }//fin function
	function add_req(){
	    $this->layout='ajax';
	    $Productos  = $this->Session->read("Productos");
	    if(!empty($this->data['ComponenteProducto']['denominacion'])){
		             if(!empty($this->data['ComponenteProducto']['cantidad'])){
		             	 if(!empty($this->data['ComponenteProducto']['unidad_medida'])){
					             	$est=false;
					            	if(isset($Productos)){
									   foreach($Productos as $Producto2){
											if($Producto2["denominacion"]==$this->data['ComponenteProducto']['denominacion'] && $Producto2["condicion"]==1){
					                              $est=true;
					                              break;
					            	         }else{
					            	          	  $est=false;
					            	         }
									    }//fin foreach
									 }else{
					            	   $est=false;
					            	 }//fin else
					            	         if($est==false){
					            	         	$Producto["id"]                    = 0;
					            	         	$Productosmedidas  = $this->Productosmedida->read(null,  $this->data['ComponenteProducto']['unidad_medida']);
                                   				$Producto["unidad_medida_deno"]    = $Productosmedidas["Productosmedida"]["denominacion"];
												$Producto["unidad_medida"]         = $this->data['ComponenteProducto']['unidad_medida'];
												$Producto["denominacion"]          = $this->data['ComponenteProducto']['denominacion'];
												$Producto["cantidad"]              = $this->data['ComponenteProducto']['cantidad'];
				                                $Producto["condicion"]             = 1;
				                                $Producto["inicio"]                = 2;
				                                $Productos[] = $Producto;
				                             }else{
				                            	msj('El producto ya se encuentra en la lista','error');
				                             }
				        }else{
			              msj('FALTAN DATOS','error');
				    	}
					}else{
		              msj('FALTAN DATOS','error');
			    	}
		}else{
	              msj('FALTAN DATOS','error');
		     }
	    $this->Session->write("Productos",$Productos);
	}//fin function
	function delete_req($id=null){
        $this->layout='ajax';
        $Productos  = $this->Session->read("Productos");
        $Productos[$id]["condicion"] = 2;
        $this->Session->write("Productos",$Productos);
        $this->render("add_req");
	}
	function seleccion_producto_req($id=null){
	  $this->layout = 'ajax';
	  $this->Producto->recursive = 2;
	  $this->set('CatalogoProductos', $this->Producto->read(null, $id));
	}//fin function








	function deletec_cotizacion($id){
		$this->layout='ajax';
        $Productos  = $this->Session->read("Productos");
        $Productos[$id]["condicion"] = 2;
        $this->Session->write("Productos",$Productos);
        msj('El registro fue eliminado','error');
        $this->set('id', $id);
	}//fin function
	function update_precio($id=null, $value=null){
        $this->layout='ajax';
        $Productos  = $this->Session->read("Productos");
        $Productos[$id]["precio_unitario"] = $value;
        $this->Session->write("Productos",$Productos);
        $this->render("update_datos");
	}//fin function

	function update_cantidad($id=null, $value=null){
        $this->layout='ajax';
        $Productos  = $this->Session->read("Productos");
        $Productos[$id]["cantidad"] = $value;
        $this->Session->write("Productos",$Productos);
        $this->render("update_datos");
	}//fin function

	function update_denominacion($id=null, $value=null){
        $this->layout='ajax';
        $Productos  = $this->Session->read("Productos");
        $Productos[$id]["denominacion"] = $value;
        $this->Session->write("Productos",$Productos);
        $this->render("update_datos");
	}//fin function

}//fin class
?>
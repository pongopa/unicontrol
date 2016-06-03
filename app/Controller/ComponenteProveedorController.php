<?php
class ComponenteProveedorController extends AppController {

	var $name = 'ComponenteProveedor';
	var $uses = array('Producto', 'Productosmedida', 'Productotipo', 'Banco', 'Moneda', 'Rubro');
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html', 'Proveedor');
    var $paginate = array('limit'=>50);

	function beforeFilter(){
		$this->checkSession();
	}
	function add_contacto($var=null){
		$this->set('var',$var);
	    $this->layout='ajax';
	    $Contactos  = $this->Session->read("Contactos");
	    if(!empty($this->data['ComponenteProveedor']['nombresyapellidos'])){
		             	$est=false;
		            	if(isset($Contactos)){
						   foreach($Contactos as $Contacto2){
								if($Contacto2["nombresyapellidos"]==$this->data['ComponenteProveedor']['nombresyapellidos'] && $Contacto2["condicion"]==1){
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
		            	         	$Contacto["id"]                    = 0;
		            	         	$Contacto["nombresyapellidos"]     = $this->data['ComponenteProveedor']['nombresyapellidos'];
		            	         	$Contacto["cargo"]                 = $this->data['ComponenteProveedor']['cargo'];
		            	         	$Contacto["cell01"]                = $this->data['ComponenteProveedor']['cell01'];
		            	         	$Contacto["cell02"]                = $this->data['ComponenteProveedor']['cell02'];
		            	         	$Contacto["email01"]               = $this->data['ComponenteProveedor']['email01'];
		            	         	$Contacto["email02"]               = $this->data['ComponenteProveedor']['email02'];
		            	         	$Contacto["idContacto"]            = "n/a";
	                                $Contacto["condicion"]             = 1;
	                                $Contacto["inicio"]                = 2;
	                                $Contactos[] = $Contacto;
	                             }else{
	                            	msj('El contacto ya se encuentra en la lista','error');
	                             }
		}else{
	              msj('FALTAN DATOS','error');
		     }
	    $this->Session->write("Contactos",$Contactos);
	}//fin function
	function delete_contacto($id=null,$var=null){
        $this->layout='ajax';
        $Contactos  = $this->Session->read("Contactos");
        $Contactos[$id]["condicion"] = 2;
        $this->Session->write("Contactos",$Contactos);
        $this->set('var',$var);
        $this->render("add_contacto");
	}

	function add_banco($var=null){
		$this->set('var',$var);
	    $this->layout='ajax';
	    $Bancos  = $this->Session->read("Bancos");
	    if(!empty($this->data['ComponenteProveedor']['banco'])){
		             	$est=false;
		            	if(isset($Bancos)){
						   foreach($Bancos as $Banco2){
								if($Banco2["banco_id"]==$this->data['ComponenteProveedor']['banco'] && $Banco2["cuenta"]==$this->data['ComponenteProveedor']['cuenta'] && $Banco2["condicion"]==1){
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
		            	         	$Banco["id"]                    = 0;
		            	         	$DataBancos  = $this->Banco->read(null,  $this->data['ComponenteProveedor']['banco']);
		            	         	$DataMonedas = $this->Moneda->read(null, $this->data['ComponenteProveedor']['moneda']);
                                    $Banco["banco"]                 = $DataBancos["Banco"]["denominacion"];
		            	         	$Banco["moneda"]                = $DataMonedas["Moneda"]["denominacion"];
		            	         	$Banco["banco_id"]              = $this->data['ComponenteProveedor']['banco'];
		            	         	$Banco["moneda_id"]             = $this->data['ComponenteProveedor']['moneda'];
		            	         	$Banco["cuenta"]                = $this->data['ComponenteProveedor']['cuenta'];
		            	         	$Banco["idBanco"]               = "n/a";
	                                $Banco["condicion"]             = 1;
	                                $Banco["inicio"]                = 2;
	                                $Bancos[] = $Banco;
	                             }else{
	                            	msj('El Banco ya se encuentra en la lista','error');
	                             }
		}else{
	              msj('FALTAN DATOS','error');
		     }
	    $this->Session->write("Bancos",$Bancos);
	}//fin function
	function delete_banco($id=null,$var=null){
        $this->layout='ajax';
        $Bancos  = $this->Session->read("Bancos");
        $Bancos[$id]["condicion"] = 2;
        $this->Session->write("Bancos",$Bancos);
        $this->set('var',$var);
        $this->render("add_banco");
	}

	function add_rubro($var=null){
		$this->set('var',$var);
	    $this->layout='ajax';
	    $Rubros  = $this->Session->read("Rubros");
	    if(!empty($this->data['ComponenteProveedor']['rubro'])){
		             	$est=false;
		            	if(isset($Rubros)){
						   foreach($Rubros as $Rubro2){
								if($Rubro2["rubro_id"]==$this->data['ComponenteProveedor']['rubro'] && $Rubro2["condicion"]==1){
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
		            	         	$Rubro["id"]                    = 0;
		            	         	$DataRubros  = $this->Rubro->read(null,  $this->data['ComponenteProveedor']['rubro']);
                                    $Rubro["rubro"]                 = $DataRubros["Rubro"]["denominacion"];
		            	         	$Rubro["rubro_id"]              = $this->data['ComponenteProveedor']['rubro'];
		            	         	$Banco["idRubro"]               = "n/a";
	                                $Rubro["condicion"]             = 1;
	                                $Rubro["inicio"]                = 2;
	                                $Rubros[] = $Rubro;
	                             }else{
	                            	msj('El Rubro ya se encuentra en la lista','error');
	                             }
		}else{
	              msj('FALTAN DATOS','error');
		     }
	    $this->Session->write("Rubros",$Rubros);
	}//fin function
	function delete_rubro($id=null,$var=null){
        $this->layout='ajax';
        $Rubros  = $this->Session->read("Rubros");
        $Rubros[$id]["condicion"] = 2;
        $this->Session->write("Rubros",$Rubros);
        $this->set('var',$var);
        $this->render("add_rubro");
	}
	function buscar_rubro($pista = null){
    	$this->layout='ajax';
    	if($pista!=null){
            $this->Session->write("pista", $pista);
    	}else{
    		$pista = $this->Session->read("pista");
    	}
    	$condicion[]        = busca_separado(array('Rubro.denominacion'),$pista);
    	$this->Rubro->recursive = 1;
    	$this->set('Rubros', $this->paginate('Rubro',$condicion));
    }//fin function
    function seleccion_rubro($id=null){
	  $this->layout = 'ajax';
	  $this->Rubro->recursive = 2;
	  $this->set('Rubros', $this->Rubro->read(null, $id));
	}//fin function

}//fin class
?>
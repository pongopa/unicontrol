<?php
class ComponenteClienteController extends AppController {

	var $name = 'ComponenteCliente';
	var $uses = array('Producto', 'Productosmedida', 'Productotipo', 'Banco', 'Moneda', 'Rubro', 'ConfPai', 'ConfDepartamento', 'ConfProvincia', 'ConfDistrito');
	var $helpers = array('Form','Ajax','Javascript','Js','Paginator'=>array('ajax' => 'Ajax'),'Html', 'Cliente');
    var $paginate = array('limit'=>50);

	function beforeFilter(){
		$this->checkSession();
	}

	function add_contacto($var=null){
		$this->set('var',$var);
	    $this->layout='ajax';
	    $Contactos  = $this->Session->read("Contactos");
	    if(!empty($this->data['ComponenteCliente']['nombresyapellidos'])){
		             	$est=false;
		            	if(isset($Contactos)){
						   foreach($Contactos as $Contacto2){
								if($Contacto2["nombresyapellidos"]==$this->data['ComponenteCliente']['nombresyapellidos'] && $Contacto2["condicion"]==1){
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
		            	         	$Contacto["nombresyapellidos"]     = $this->data['ComponenteCliente']['nombresyapellidos'];
		            	         	$Contacto["cargo"]                 = $this->data['ComponenteCliente']['cargo'];
		            	         	$Contacto["cell01"]                = $this->data['ComponenteCliente']['cell01'];
		            	         	$Contacto["cell02"]                = $this->data['ComponenteCliente']['cell02'];
		            	         	$Contacto["email01"]               = $this->data['ComponenteCliente']['email01'];
		            	         	$Contacto["email02"]               = $this->data['ComponenteCliente']['email02'];
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





	function add_direccion($var=null){
		$this->set('var',$var);
	    $this->layout='ajax';
	    $Direcciones  = $this->Session->read("Direcciones");
	    if(!empty($this->data['ComponenteCliente']['direccion']) &&
	       !empty($this->data['ComponenteCliente']['referencia']) &&
	       !empty($this->data['ComponenteCliente']['conf_pai_id']) &&
	       !empty($this->data['ComponenteCliente']['conf_departamento_id']) &&
	       !empty($this->data['ComponenteCliente']['conf_provincia_id']) &&
	       !empty($this->data['ComponenteCliente']['conf_distrito_id'])
	    ){
		             	$est=false;
		            	if(isset($Direcciones)){
						   foreach($Direcciones as $Direccione2){
								if($Direccione2["direccion"]==$this->data['ComponenteCliente']['direccion'] &&
								   $Direccione2["condicion"]==1){
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
		            	         	$Direccion["id"]                    = 0;
		            	         	$Direccion["direccion"]             = $this->data['ComponenteCliente']['direccion'];
		            	         	$Direccion["referencia"]            = $this->data['ComponenteCliente']['referencia'];
		            	         	$Direccion["conf_pai_id"]           = $this->data['ComponenteCliente']['conf_pai_id'];
		            	         	$Direccion["conf_departamento_id"]  = $this->data['ComponenteCliente']['conf_departamento_id'];
		            	         	$Direccion["conf_provincia_id"]     = $this->data['ComponenteCliente']['conf_provincia_id'];
		            	         	$Direccion["conf_distrito_id"]      = $this->data['ComponenteCliente']['conf_distrito_id'];
		            	         	$DataConfPais           = $this->ConfPai->read(null,  $this->data['ComponenteCliente']['conf_pai_id']);
                                    $Direccion["pai_deno"]                 = $DataConfPais["ConfPai"]["denominacion"];
                                    $DataConfDepartamentos  = $this->ConfDepartamento->read(null,  $this->data['ComponenteCliente']['conf_departamento_id']);
                                    $Direccion["dep_deno"]                 = $DataConfDepartamentos["ConfDepartamento"]["denominacion"];
                                    $DataConfProvincias     = $this->ConfProvincia->read(null,  $this->data['ComponenteCliente']['conf_provincia_id']);
                                    $Direccion["pro_deno"]                 = $DataConfProvincias["ConfProvincia"]["denominacion"];
                                    $DataConfDistritos      = $this->ConfDistrito->read(null,  $this->data['ComponenteCliente']['conf_distrito_id']);
                                    $Direccion["dis_deno"]                 = $DataConfDistritos["ConfDistrito"]["denominacion"];
		            	         	$Direccion["idDireccion"]           = "n/a";
	                                $Direccion["condicion"]             = 1;
	                                $Direccion["inicio"]                = 2;
	                                $Direcciones[] = $Direccion;
	                             }else{
	                            	msj('La dirección ya se encuentra en la lista','error');
	                             }
		}else{
	              msj('FALTAN DATOS','error');
		     }
	    $this->Session->write("Direcciones",$Direcciones);
	}//fin function
	function delete_direccion($id=null,$var=null){
        $this->layout='ajax';
        $Direcciones  = $this->Session->read("Direcciones");
        $Direcciones[$id]["condicion"] = 2;
        $this->Session->write("Direcciones",$Direcciones);
        $this->set('var',$var);
        $this->render("add_direccion");
	}


	function select ($tipo=null,$id=null) {
	        $this->layout='ajax';
	        $this->set('id',$id);
	        $this->set('tipo',$tipo);

	       		   if($tipo==1){
	        		$confDepartamentos = $this->ConfDepartamento->find('list',array('conditions'=>array('conf_pai_id'=>$id),'fields'=>array('id','denominacion')));
					$this->set(compact('confDepartamentos'));
	        }else  if($tipo==2){
	        		$confProvincias = $this->ConfProvincia->find('list',array('conditions'=>array('conf_departamento_id'=>$id),'fields'=>array('id','denominacion')));
					$this->set(compact('confProvincias'));
	        }else {
	        		$confDistritos = $this->ConfDistrito->find('list',array('conditions'=>array('conf_provincia_id'=>$id),'fields'=>array('id','denominacion')));
					$this->set(compact('confDistritos'));
	        }
	}

}//fin class
?>
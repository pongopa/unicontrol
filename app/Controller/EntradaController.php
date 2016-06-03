<?php
App::uses('AppController', 'Controller');
class EntradaController extends AppController {

	var $name = 'Entrada';
	var $uses = array('Usuario','Institucione');
	var    $helpers = array('Form','Ajax','Javascript','Js','Paginator', 'Html');


	function index ($var=null) {
		$this->layout="inicio";
		if(isset($var) && $var == "login"){
             if(!empty($this->request->data['usuario']) && !empty($this->request->data['clave'])){
				extract($this->request->data);
				$usuario = up($usuario);
				$clave = up(md5($clave));
//                $clave = up($clave);
				$c = $this->Usuario->find('count',array('conditions'=>array('Usuario.usuario'=>$usuario,'Usuario.clave'=>$clave, 'Usuario.activo'=>1)));
				if($c!=0){
					  $d = $this->Usuario->find('all',  array('conditions'=>array('Usuario.usuario'=>$usuario,'Usuario.clave'=>$clave, 'Usuario.activo'=>1)));
					  $inst = $this->Institucione->find('all',  array('conditions'=>array('Institucione.id'=>$d[0]["Dependencia"]["institucion_id"])));
					  extract($d[0]["Usuario"]);
					  $this->Usuario->query("UPDATE usuarios SET enlinea=1, entrada_actualizada=now() WHERE id=$id");
					  $this->Session->write('AUTENTICADO', true);
					  $this->Session->write('USUARIO', $usuario);
					  $this->Session->write('USUARIO_ID', $id);
					  $this->Session->write('USUARIO_EMAIL', $email);
					  $this->Session->write('DEPENDENCIA_ID', $dependencia_id);
					  $this->Session->write('DEPENDENCIA_ORIG_ID', $dependencia_orig_id);
					  $this->Session->write('INSTITUCION_ID', $inst[0]["Institucione"]["id"]);
					  $this->Session->write('DEPENDENCIA', $d[0]["Dependencia"]["denominacion"]);
					  $this->Session->write('NIVEL_DEPENDENCIA',  $d[0]["Dependencia"]["nivel_dependencia"]);
					  $this->Session->write('CODIGO_DEPENDENCIA', $d[0]["Dependencia"]["codigo_dependencia"]);
					  $this->Session->write('INSTITUCION', $inst[0]["Institucione"]["denominacion"]);
					  $this->Session->write('USUARIO_NIVEL', $nivel);
					  $this->Session->write('USUARIO_ACTIVO', $activo);
					  $this->Session->write('USUARIO_AREA', $area_id);
					  $this->Session->write('USUARIO_CARGO', $cargo_id);
                      $this->redirect('/modulos/view_link');
				}else{
				      $this->set("msg", "USUARIO/CONTRASEÑA INVALIDOS");
				}
             }
		}elseif(isset($var) && $var == "cerrar_session"){
			$this->set("msg", "SESIÓN FINALIZADA");
		}
	}//end index
	function salir(){
		$this->layout="inicio";
		$id=$this->Session->read('USUARIO_ID');
		if($id!=''){
			$this->Usuario->query("UPDATE usuarios SET enlinea=0, entrada_actualizada=now() WHERE id='$id'  ");
		}
		$this->Session->delete('AUTENTICADO');
		$this->Session->delete('USUARIO');
		$this->Session->delete('USUARIO_ID');
		$this->Session->delete('USUARIO_EMAIL');
		$this->Session->delete('DEPENDENCIA_ID');
		$this->Session->delete('DEPENDENCIA_ORIG_ID');
		$this->Session->delete('INSTITUCION_ID');
		$this->Session->delete('DEPENDENCIA');
		$this->Session->delete('INSTITUCION');
		$this->Session->delete('USUARIO_NIVEL');
		$this->Session->delete('USUARIO_ACTIVO');
		$this->Session->delete('NIVEL_DEPENDENCIA');
	    $this->Session->delete('CODIGO_DEPENDENCIA');
	    unset($_SESSION);

//		$this->redirect('/entrada/index/cerrar_session');
    }


}
?>
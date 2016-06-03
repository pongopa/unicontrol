<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout." [-] ".Configure::read('name_sistema'); ?>
	</title>
	<?php

        echo $this->Html->css('steel/steel')."\n";
        echo $this->Html->css('reduce-spacing')."\n";
		echo $this->Html->script('prototype/prototype_1.7_rc2')."\n";
        echo $this->Html->script('scriptaculous/scriptaculous.js?load=effects,slider,builder')."\n";
        echo $this->Html->script('sistema/programas')."\n";
        echo $this->Html->script('sistema/situaciones')."\n";
        echo $this->Html->script('jscal2')."\n";
        echo $this->Html->script('lang/es')."\n";
        echo $this->Html->script('ampie/swfobject.js')."\n";
        if(Configure::read('desarrollo')==1){
        	echo $this->Html->css('/menu/theme_desarrollo')."\n";
	    	echo $this->Html->css('unicon_desarrollo')."\n";
	    	echo $this->Html->css('navegacion_desarrollo')."\n";
	    	echo $this->Html->css('jscal2_desarrollo')."\n";
	    	echo $this->Html->css('ventana/basic_desarrollo')."\n";
	    	echo $this->Html->css('jquery/jquery.treeview_desarrollo.css')."\n";
        	echo $this->Html->script('sistema/generales_desarrollo')."\n";
        	echo $this->Html->script('menu/theme_desarrollo')."\n";
        	echo $this->Html->script('menu/JSCookMenu_desarrollo')."\n";
	    }else{
	    	echo $this->Html->css('/menu/theme')."\n";
	    	echo $this->Html->css('unicon')."\n";
	    	echo $this->Html->css('navegacion')."\n";
	    	echo $this->Html->css('jscal2')."\n";
	    	echo $this->Html->css('ventana/basic')."\n";
	    	echo $this->Html->css('jquery/jquery.treeview.css')."\n";
        	echo $this->Html->script('sistema/generales')."\n";
        	echo $this->Html->script('menu/theme')."\n";
        	echo $this->Html->script('menu/JSCookMenu')."\n";

	    }
		echo $scripts_for_layout;
	?>


</head>
<body>
<?php
echo $this->Html->div(
					$class=null,
					$this->Html->image("cargando2.gif", array("alt"=>"Loading")),
					array('id'=>'mini_loading','style'=>'display:none;')
					)."\n";

echo $this->Html->div(
		$class=null,
		"\n\t".$this->Html->div('top_izq_2','',array('id'=>'top_izq'))."\n".
		"\t".$this->Html->div('top_centro_2',
			"\n\t\t".$this->Html->div('titulo_top_sup',cambiar(up($this->Session->read('INSTITUCION'))))."\n".
			"\t\t".$this->Html->div('titulo_top_inf',(cambiar(mascara($this->Session->read('CODIGO_DEPENDENCIA'),4)." - ".up($this->Session->read('DEPENDENCIA')))))."\n\t",
		array('id'=>'top_centro'))."\n".
		"\t".$this->Html->div('top_der_2','',array('id'=>'top_der'))."\n".
		"\t".$this->Html->div('menu_menu_1','',array('id'=>'menu_menu_1'))."\n".
		"\t".$this->Html->div(null,up($this->Session->read('USUARIO')),array('id'=>'identificador_usuario'))."\n".
		"\t".$this->Html->div(null,'',array('id'=>'bloque_mensajes','style'=>'display:block;'))."\n",
		array('id'=>'top')
		)."\n";

echo $this->Html->div('menu_menu_inactivo0','',array('id'=>'menu_menu_inactivo'))."\n";
echo $this->Html->div('principal',$this->Session->flash()."\n".$content_for_layout,array('id'=>'principal'))."\n";
?>
<?php
if(isset($msj) && $msj!=null){
    	msj($msj,'info');
}
?>
<span class="continuar_input_admin" title="Continuar"> </span>
<span class="guardar_input2_admin" title="Guardar"> </span>
<span class="modificar_input_admin" title="Modificar"> </span>
<span class="eliminar_input_admin" title="Eliminar / Anualar"> </span>
<span class="consultar_input_admin" title="Consultar"> </span>
<span class="buscar_input_admin" title="Buscar"> </span>
<span class="primero_input_admin" title="Primero"> </span>
<span class="anterior_input_admin" title="Anterior"> </span>
<span class="siguiente_input_admin" title="Siguiente"> </span>
<span class="ultimo_input_admin" title="Ultimo"> </span>
<span class="generar_input_admin" title="Generar reporte"> </span>
<span class="regresar_input_admin" title="Añadir Nuevo"> </span>
<span class="salir_input_admin" title="Salir"> </span>
<span class="ayuda_input_admin" title="Ayuda"> </span>


<div id="div_menu_navegacion"></div>
<div id="botones_navegacion_acciones"></div>

<?

echo $this->Html->script('ventana/jquery')."\n";
echo $this->Html->script('ventana/jquery.simplemodal')."\n";
echo $this->Html->script('ventana/basic')."\n";
//echo $this->Html->script('jquery/jquery.cookie.js')."\n";
//echo $this->Html->script('jquery/jquery.treeview.js')."\n";
?>
<script language="JavaScript" type="text/javascript">
  jQuery.noConflict();

  /*jQuery(document).ready(function(){

	// first example
	jQuery("#browser").treeview();


});*/
</script>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
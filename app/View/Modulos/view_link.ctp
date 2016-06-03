<div id="logo_sica"></div>
<div id="iconos_modulos_version3" class="iconos_modulos_version3">
	<?php
	if(isset($modulos)){$i=1;
	    foreach($modulos as $mod){
	    	extract($mod['Modulo']);
	?>
		<div> &nbsp;<b><?=mascara($i,2);?></b>&nbsp;<a href="<?= $this->webroot.'modulos/modulo/'.$id ?>"><?=up($denominacion)?></a></div>
	<?php
	     $i++;
	     }//fin foreach
	}//fin if
	?>
	<div>&nbsp;<b>&nbsp;&nbsp;&nbsp;&nbsp;</b>&nbsp;<a href="<?= $this->webroot.'entrada/salir' ?>">CERRAR SESIÓN</a></div>
</div>
<div id="container"></div><div style="
	z-index:2;
	position: absolute;
    left: 46%;
    top: 105%;
    height: 240px;
    width: auto;
    margin:auto auto auto auto;
    /**/
    margin-top: -120px;    /*200px/2*/
    margin-left: -200px;    /*300px/2 */
    /**/
text-shadow: 1px 1px 1px #696969;">

<img src="<?= $this->webroot ?>img/apache.png">
<img src="<?= $this->webroot ?>img/php.png">
<img src="<?= $this->webroot ?>img/button-css.png">
<img src="<?= $this->webroot ?>img/ajax2.png">
<img src="<?= $this->webroot ?>img/cake.power.PNG">
<img src="<?= $this->webroot ?>img/ubuntu.png">
<center>
</br>Sistema Integral para el Control de Cadaveres en el CICPC.<br />
Software Dise&ntilde;ado por Ing. R.B. & Asoc. &copy; 2013.<br />
San Juan de los Morros - Estado Gu&aacute;rico - VE.</center></div>

 <object style="visibility: visible;" id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" height="271" width="232">
    <param name="movie" value="flash/logo_cicpc.swf">
    <param name="quality" value="high">
    <param name="wmode" value="transparent">
    <param name="swfversion" value="8.0.35.0">
    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don&#8217;t want users to see the prompt. -->
    <param name="expressinstall" value="Scripts/expressInstall.swf">
    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="<?= $this->webroot ?>img/logo_cicpc.swf" style="position:absolute;bottom:37%; right:45%;"  height="151" width="112">

